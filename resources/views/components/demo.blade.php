<div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">
    <div class="grid grid-cols-1 md:grid-cols-2">

        <div class="flex flex-col justify-center gap-0 px-10 py-12">
            <h1 class="font-serif text-4xl font-black leading-tight tracking-tight text-gray-900 dark:text-white">
                CATERING PREMIUM
            </h1>
            <h2 class="font-serif text-3xl font-bold italic leading-snug text-orange-600">
                UNTUK SETIAP MAJLIS
            </h2>
            <p class="mt-4 max-w-sm text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                Hidangan berkualiti, rasa terbaik dan servis profesional untuk memenuhi keperluan majlis anda
            </p>
            <div class="mt-6 flex flex-wrap items-center gap-3">
                <a href="#pakej"
                   class="inline-flex items-center gap-2 rounded-full bg-amber-900 px-6 py-3 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-amber-950">
                    Lihat Pakej <span class="text-base font-light">›</span>
                </a>
                <a href="https://wa.me/60197731908?text=Saya%20nak%20tanya%20pakej%20catering"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 rounded-full border-2 border-orange-600 px-5 py-2.5 text-sm font-semibold text-orange-600 transition hover:bg-orange-600 hover:text-white">
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24 11.47 11.47 0 0 0 3.58.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.58a1 1 0 0 1-.25 1.02l-2.2 2.19z"/></svg>
                    019-770 5042
                </a>
            </div>
        </div>

        <div class="relative flex min-h-64 items-center justify-center overflow-hidden rounded-tr-2xl rounded-br-2xl bg-gradient-to-br from-stone-200 via-stone-300 to-stone-400 md:min-h-full">
            <div class="absolute inset-0 opacity-20">

            </div>
            <div class="absolute left-1/2 top-1/2 h-44 w-44 -translate-x-1/2 -translate-y-1/2 rounded-full border-2 border-amber-800/20"></div>
            <div class="absolute left-1/4 top-1/4 h-28 w-28 rounded-full border-2 border-amber-800/15"></div>
            <div class="absolute bottom-1/4 right-1/4 h-20 w-20 rounded-full border-2 border-amber-800/15"></div>

            <div class="relative z-10 text-center">
                {{-- <svg class="mx-auto mb-2 h-12 w-12 fill-amber-800/25" ></svg> --}}
                <span class="text-xs font-medium uppercase tracking-widest text-amber-800/40">gambar ape ape pun</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 divide-y divide-stone-100 border-t border-stone-100 bg-stone-50 dark:divide-gray-700 dark:border-gray-700 dark:bg-gray-900 sm:grid-cols-3 sm:divide-x sm:divide-y-0">

        @foreach ([
            ['icon' => 'M12 3C6.48 3 2 7.48 2 13h2c0-4.42 3.58-8 8-8s8 3.58 8 8h2c0-5.52-4.48-10-10-10zm0 4c-3.31 0-6 2.69-6 6h2c0-2.21 1.79-4 4-4s4 1.79 4 4h2c0-3.31-2.69-6-6-6zm1 6h-2v2l-3 3 1.41 1.41L12 16.83l2.59 2.58L16 18l-3-3v-2z', 'title' => 'Kualiti Terbaik', 'desc' => 'Menggunakan bahan segar dan resipi turun temurun untuk rasa yang enak'],
            ['icon' => 'M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z', 'title' => 'Servis Profesional', 'desc' => 'Pasukan yang berpengalaman dan perkhidmatan yang terbaik'],
            ['icon' => 'M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z', 'title' => 'Pelanggan Diutamakan', 'desc' => 'Kepuasan pelanggan adalah keutamaan kami'],
        ] as $feature)
        <div class="flex items-start gap-3 p-6 transition hover:bg-stone-100 dark:hover:bg-gray-800">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-orange-500 to-orange-700">
                <svg class="h-5 w-5 fill-white" viewBox="0 0 24 24"><path d="{{ $feature['icon'] }}"/></svg>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $feature['title'] }}</h3>
                <p class="mt-1 text-xs leading-relaxed text-gray-500 dark:text-gray-400">{{ $feature['desc'] }}</p>
            </div>
        </div>
        @endforeach

    </div>
</div>
