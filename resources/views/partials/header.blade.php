<header class="border-b border-zinc-200 bg-[#f5f5f5]">
    <div class="mx-auto flex h-[84px] w-full max-w-[1280px] items-center justify-between gap-6 px-8 lg:px-14">
        <a href="{{ route('demo') }}" class="group flex items-center gap-3">
            <div class="flex h-[56px] w-[120px] items-center justify-center rounded border border-dashed border-zinc-400 bg-white text-[10px] font-semibold uppercase tracking-[0.14em] text-zinc-500">
                Logo
            </div>

            <div class="flex flex-col">
                <h1 class="text-[11px] font-extrabold uppercase tracking-[0.18em] text-slate-900">
                    Enyfadz Enterprise
                </h1>
                <span class="mt-0.5 text-[10px] font-medium tracking-widest text-slate-500">Catering & Services</span>
            </div>
        </a>

        <nav class="flex items-center gap-8 text-[14px] uppercase tracking-wide text-zinc-700">
            <a href="{{ route('demo') }}" class="transition-colors hover:text-zinc-950">
                Utama
            </a>
            <a href="{{ route('pakej') }}" class="transition-colors hover:text-zinc-950">
                Pakej
            </a>
            <a href="{{ route('menu') }}" class="transition-colors hover:text-zinc-950">
                Menu
            </a>
            <a href="{{ route('tentang_kami') }}" class="transition-colors hover:text-zinc-950">
                Tentang Kami
            </a>
            <a href="{{ route('hubungi_kami') }}" class="transition-colors hover:text-zinc-950">
                Hubungi Kami
            </a>
        </nav>
    </div>
</header>
