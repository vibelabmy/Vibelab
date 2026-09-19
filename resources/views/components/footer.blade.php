<?php

use Livewire\Component;

new class extends Component
{
    /**
     * @var array<int, array{name: string, logo: ?string, layout: string}>
     */
    public array $row1 = [
        [
            'name' => 'Jabatan Perdana Menteri',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Coat_of_arms_of_Malaysia.svg/120px-Coat_of_arms_of_Malaysia.svg.png',
            'layout' => 'stacked',
        ],
        [
            'name' => 'ASEAN Malaysia 2025',
            'logo' => 'https://images.seeklogo.com/logo-png/58/1/asean-2025-malaysia-logo-png_seeklogo-586120.png',
            'layout' => 'stacked',
        ],
        [
            'name' => 'Imigresen Malaysia',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/0/07/Logo_of_Department_of_Immigration_Malaysia.svg?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=original',
            'layout' => 'stacked',
        ],
        [
            'name' => 'Kementerian Dalam Negeri',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Coat_of_arms_of_Malaysia.svg/120px-Coat_of_arms_of_Malaysia.svg.png',
            'layout' => 'stacked',
        ],
        [
            'name' => 'Malaysia Madani',
            'logo' => 'https://images.seeklogo.com/logo-png/46/1/malaysia-madani-logo-png_seeklogo-469993.png',
            'layout' => 'stacked',
        ],
    ];

    /**
     * @var array<int, array{name: string, logo: ?string, layout: string}>
     */
    public array $row2 = [
        [
            'name' => "Kementerian\nPendidikan\nMalaysia",
            'logo' => 'https://vectorseek.com/wp-content/uploads/2023/08/Kementerian-Pendidikan-Malaysia-Logo-Vector.svg-.png',
            'layout' => 'inline',
        ],
        [
            'name' => 'Agensi Antidadah Kebangsaan',
            'logo' => 'https://upload.wikimedia.org/wikipedia/ms/f/fb/AADK_Logo.gif?_=20131216083420',
            'layout' => 'stacked',
        ],
        [
            'name' => 'SPRM',
            'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_the_Malaysian_Anti-Corruption_Commission.svg/960px-Logo_of_the_Malaysian_Anti-Corruption_Commission.svg.png?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=thumbnail&_=20150505083652',
            'layout' => 'stacked',
        ],
        [
            'name' => 'Minister of Finance Inc.',
            'logo' => 'https://images.seeklogo.com/logo-png/17/1/ministry-of-finance-malaysia-logo-png_seeklogo-176217.png',
            'layout' => 'stacked',
        ],
        [
            'name' => 'Kementerian Kesihatan Malaysia',
            'logo' => 'https://images.seeklogo.com/logo-png/61/1/kkm-kami-sedia-membantu-logo-png_seeklogo-613127.png',
            'layout' => 'stacked',
        ],
    ];
};
?>

<section class="w-full bg-white px-4 py-12">
    <div class="mb-10 text-center">
        <h2 class="mb-4 text-4xl font-extrabold uppercase tracking-widest text-orange-500">
            Kolaborasi Kami
        </h2>
        <p class="mx-auto max-w-lg text-base leading-relaxed text-gray-500">
            Kami mengembangkan jaringan kerjasama dengan profesional industri acara, seperti pengelola majlis, penganjur acara, dan perancang perkahwinan:
        </p>
        <div class="mt-6 border-t border-gray-200"></div>
    </div>

    <div class="mx-auto mb-12 flex max-w-5xl flex-wrap items-center justify-center gap-10">
        @foreach ($row1 as $partner)
            <div class="flex w-36 flex-col items-center gap-2">
                <img
                    src="{{ $partner['logo'] }}"
                    alt="Logo rakan kerjasama"
                    class="h-20 object-contain"
                    onerror="this.onerror=null;this.src='https://placehold.co/160x80?text=Logo';this.classList.add('rounded','border','border-gray-200','bg-gray-50','p-2')"
                />
            </div>
        @endforeach
    </div>

    <div class="mx-auto flex max-w-5xl flex-wrap items-center justify-center gap-10">
        @foreach ($row2 as $partner)
            @if ($partner['layout'] === 'inline')
                <div class="flex w-52 flex-row items-center gap-3">
                    <img
                        src="{{ $partner['logo'] }}"
                        alt="Logo rakan kerjasama"
                        class="h-16 flex-shrink-0 object-contain"
                        onerror="this.onerror=null;this.src='https://placehold.co/160x80?text=Logo';this.classList.add('rounded','border','border-gray-200','bg-gray-50','p-2')"
                    />
                </div>
            @else
                <div class="flex w-36 flex-col items-center gap-2">
                    <img
                        src="{{ $partner['logo'] }}"
                        alt="Logo rakan kerjasama"
                        class="h-20 object-contain"
                        onerror="this.onerror=null;this.src='https://placehold.co/160x80?text=Logo';this.classList.add('rounded','border','border-gray-200','bg-gray-50','p-2')"
                    />
                </div>
            @endif
        @endforeach
    </div>
</section>

<footer class="border-t border-zinc-200 bg-[#f5f5f5]">
    <div class="mx-auto flex w-full max-w-[1280px] items-center justify-between px-8 py-3 text-xs text-zinc-500 lg:px-14">
        <p>Enyfadz Enterprise | {{ date('Y') }}</p>
    </div>
</footer>
