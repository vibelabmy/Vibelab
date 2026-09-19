<div
    class="relative flex min-h-screen flex-col items-center justify-center px-4 py-16"
    x-show="unlocked"
    x-cloak
>
    <p class="text-center font-script text-5xl text-[#f4d4d8] sm:text-6xl" x-text="greeting"></p>
    <p
        class="mt-3 text-center font-serif text-base text-[#c9a36b]"
        x-show="! opened"
        x-cloak
    >
        Tekan surat ni sayang hehe
    </p>

    <button
        type="button"
        class="birthday-envelope mt-12"
        :class="{ 'is-open': opened }"
        @click="open()"
        :aria-expanded="showCard.toString()"
        aria-label="Open the birthday envelope"
    >
        <span class="birthday-envelope-letter" aria-hidden="true">
            <span class="birthday-envelope-letter-line"></span>
            <span class="birthday-envelope-letter-line short"></span>
            <span class="birthday-envelope-letter-heart">♥</span>
        </span>
        <span class="birthday-envelope-pocket" aria-hidden="true"></span>
        <span class="birthday-envelope-flap" aria-hidden="true"></span>
        <span class="birthday-envelope-seal" aria-hidden="true">♥</span>
    </button>

    <div
        x-show="showCard"
        x-cloak
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 translate-y-6 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="absolute inset-0 z-30 flex items-center justify-center bg-[#1c0f14]/55 px-4 py-8 backdrop-blur-[2px]"
        @keydown.escape.window="fold()"
    >
        <article class="birthday-card relative max-h-[90vh] w-full max-w-lg overflow-y-auto px-8 py-10 sm:px-12 sm:py-12">
            <p class="text-center font-script text-5xl text-[#8b3a4a] sm:text-6xl" x-text="title"></p>
            <div class="mx-auto mt-4 h-px w-24 bg-gradient-to-r from-transparent via-[#c9a36b] to-transparent"></div>
            <p class="mt-8 whitespace-pre-line text-left font-serif text-base leading-8 text-[#4a2a34] sm:text-lg sm:leading-9" x-text="message"></p>
            <p class="mt-10 text-center font-script text-3xl text-[#8b3a4a]" x-text="from"></p>

            <div class="mt-10 flex flex-col items-center gap-4">
                <button
                    type="button"
                    class="rounded-full border border-[#c9a36b]/70 px-5 py-2 text-sm tracking-[0.18em] uppercase text-[#6b2d3c] transition hover:bg-[#c9a36b]/15"
                    @click="fold()"
                >
                    Fold the letter
                </button>

                <form method="POST" action="{{ route('birthday.logout') }}">
                    <input type="hidden" name="_token" :value="csrf">
                    <button type="submit" class="text-xs tracking-[0.2em] uppercase text-[#8b3a4a]/60 transition hover:text-[#8b3a4a]">
                        Close the door
                    </button>
                </form>
            </div>
        </article>
    </div>
</div>
