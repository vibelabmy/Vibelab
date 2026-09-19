@props(['title' => 'Untukmu'])

@php
    $song = config('birthday.song');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'Untukmu' }}</title>
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|great-vibes:400&display=swap" rel="stylesheet" />

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('birthdayMusic', {
                    playing: false,
                    started: false,
                    player: null,
                    pendingPlay: false,
                    startSeconds: 170,
                    bind(element) {
                        this.startSeconds = Number(element.dataset.startSeconds || 170);
                        const store = this;

                        const startPlayer = () => {
                            if (store.player || ! window.YT || ! window.YT.Player) {
                                return;
                            }

                            store.player = new window.YT.Player(element, {
                                events: {
                                    onReady: () => store.tryPlay(),
                                    onStateChange: (event) => store.onStateChange(event),
                                },
                            });
                        };

                        window.onYouTubeIframeAPIReady = startPlayer;

                        if (window.YT && window.YT.Player) {
                            startPlayer();
                        }
                    },
                    playFromVerse() {
                        if (this.started) {
                            return;
                        }

                        this.started = true;
                        this.pendingPlay = true;
                        this.tryPlay();
                    },
                    tryPlay() {
                        if (! this.pendingPlay || ! this.player?.playVideo) {
                            return;
                        }

                        this.player.unMute();
                        this.player.setVolume(100);
                        this.player.seekTo(this.startSeconds, true);
                        this.player.playVideo();
                    },
                    onStateChange(event) {
                        this.playing = event.data === window.YT.PlayerState.PLAYING;

                        if (this.playing && (this.player?.getCurrentTime?.() || 0) < this.startSeconds - 1) {
                            this.player.seekTo(this.startSeconds, true);
                        }
                    },
                });

                Alpine.data('birthdayLetter', (initial = {}) => ({
                    unlocked: Boolean(initial.unlocked),
                    submitting: false,
                    csrf: initial.csrf || document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
                    loginUrl: initial.loginUrl || '',
                    cardUrl: initial.cardUrl || '',
                    greeting: initial.greeting || '',
                    title: initial.title || '',
                    message: initial.message || '',
                    from: initial.from || '',
                    errors: {},
                    opened: false,
                    showCard: false,
                    open() {
                        if (! this.opened) {
                            Alpine.store('birthdayMusic').playFromVerse();
                        }

                        if (this.showCard) {
                            return;
                        }

                        if (this.opened) {
                            this.showCard = true;

                            return;
                        }

                        this.opened = true;
                        window.setTimeout(() => { this.showCard = true }, 900);
                    },
                    fold() {
                        this.showCard = false;
                    },
                    async submitLogin(event) {
                        this.submitting = true;
                        this.errors = {};

                        const response = await fetch(this.loginUrl, {
                            method: 'POST',
                            headers: {
                                Accept: 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': this.csrf,
                            },
                            body: new FormData(event.target),
                        });

                        const data = await response.json().catch(() => ({}));
                        this.submitting = false;

                        if (response.status === 422) {
                            this.errors = data.errors || {};

                            return;
                        }

                        if (! response.ok) {
                            this.errors = { name: ['That key does not open this door.'] };

                            return;
                        }

                        this.greeting = data.greeting;
                        this.title = data.title;
                        this.message = data.message;
                        this.from = data.from;
                        this.csrf = data.csrf || this.csrf;
                        document.querySelector('meta[name="csrf-token"]')?.setAttribute('content', this.csrf);
                        this.unlocked = true;

                        if (this.cardUrl) {
                            window.history.pushState({}, '', this.cardUrl);
                        }
                    },
                }));
            });
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://www.youtube.com/iframe_api"></script>
    </head>
    <body class="birthday-body min-h-screen font-serif antialiased">
        <div class="birthday-glow" aria-hidden="true"></div>
        <div class="birthday-petals" aria-hidden="true">
            @for ($i = 0; $i < 18; $i++)
                <span class="birthday-petal" style="--i: {{ $i }}"></span>
            @endfor
        </div>

        <main class="relative z-10">
            {{ $slot }}
        </main>

        <div
            class="birthday-music-dock"
            :class="{ 'is-on': $store.birthdayMusic.started }"
        >
            <iframe
                id="birthday-song-player"
                class="birthday-song-frame"
                data-video-id="{{ $song['youtube_id'] }}"
                data-start-seconds="{{ $song['start_seconds'] }}"
                title="{{ $song['title'] }}"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen
                x-data
                x-init="$store.birthdayMusic.bind($el)"
            ></iframe>

            <div class="flex min-w-0 flex-1 items-center gap-3 px-1 py-1 text-[#fbf4ee]">
                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#8b3a4a] text-sm">♪</span>
                <span class="flex min-w-0 flex-col gap-0.5">
                    <span class="truncate font-serif text-sm leading-none">{{ $song['title'] }}</span>
                    <span class="truncate text-xs leading-none text-[#c9a36b]">{{ $song['artist'] }}</span>
                </span>
            </div>
        </div>

        <script>
            (() => {
                const frame = document.getElementById('birthday-song-player');
                const videoId = frame?.dataset.videoId;
                const start = Number(frame?.dataset.startSeconds || 170);

                if (! frame || ! videoId) {
                    return;
                }

                const origin = encodeURIComponent(window.location.origin);
                frame.src = `https://www.youtube.com/embed/${videoId}?start=${start}&enablejsapi=1&playsinline=1&rel=0&modestbranding=1&origin=${origin}`;
            })();
        </script>
    </body>
</html>
