<template>
    <div class="footer-root">
        <section class="collab">
            <div class="collab-header">
                <h2 class="collab-title">Kolaborasi Kami</h2>
                <p class="collab-lead">
                    Kami mengembangkan jaringan kerjasama dengan profesional industri acara, seperti pengelola majlis,
                    penganjur acara, dan perancang perkahwinan:
                </p>
                <div class="collab-rule" />
            </div>

            <div class="logo-row">
                <div
                    v-for="(partner, idx) in row1"
                    :key="'r1-' + idx"
                    class="logo-cell logo-cell--stacked"
                >
                    <img
                        :src="partner.logo"
                        alt="Logo rakan kerjasama"
                        class="logo-img logo-img--tall"
                        @error="onImgError"
                    >
                </div>
            </div>

            <div class="logo-row logo-row--second">
                <div
                    v-for="(partner, idx) in row2"
                    :key="'r2-' + idx"
                    :class="[
                        'logo-cell',
                        partner.layout === 'inline' ? 'logo-cell--inline' : 'logo-cell--stacked',
                    ]"
                >
                    <img
                        :src="partner.logo"
                        alt="Logo rakan kerjasama"
                        :class="[
                            'logo-img',
                            partner.layout === 'inline' ? 'logo-img--inline' : 'logo-img--tall',
                        ]"
                        @error="onImgError"
                    >
                </div>
            </div>
        </section>

        <footer class="bottom-bar">
            <div class="bottom-inner">
                <p class="bottom-text">Enyfadz Enterprise | {{ year }}</p>
            </div>
        </footer>
    </div>
</template>

<script setup>
const year = new Date().getFullYear();

const row1 = [
    {
        name: 'Jabatan Perdana Menteri',
        logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Coat_of_arms_of_Malaysia.svg/120px-Coat_of_arms_of_Malaysia.svg.png',
        layout: 'stacked',
    },
    {
        name: 'ASEAN Malaysia 2025',
        logo: 'https://images.seeklogo.com/logo-png/58/1/asean-2025-malaysia-logo-png_seeklogo-586120.png',
        layout: 'stacked',
    },
    {
        name: 'Imigresen Malaysia',
        logo: 'https://upload.wikimedia.org/wikipedia/commons/0/07/Logo_of_Department_of_Immigration_Malaysia.svg?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=original',
        layout: 'stacked',
    },
    {
        name: 'Kementerian Dalam Negeri',
        logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Coat_of_arms_of_Malaysia.svg/120px-Coat_of_arms_of_Malaysia.svg.png',
        layout: 'stacked',
    },
    {
        name: 'Malaysia Madani',
        logo: 'https://images.seeklogo.com/logo-png/46/1/malaysia-madani-logo-png_seeklogo-469993.png',
        layout: 'stacked',
    },
];

const row2 = [
    {
        name: 'Kementerian Pendidikan Malaysia',
        logo: 'https://vectorseek.com/wp-content/uploads/2023/08/Kementerian-Pendidikan-Malaysia-Logo-Vector.svg-.png',
        layout: 'inline',
    },
    {
        name: 'Agensi Antidadah Kebangsaan',
        logo: 'https://upload.wikimedia.org/wikipedia/ms/f/fb/AADK_Logo.gif?_=20131216083420',
        layout: 'stacked',
    },
    {
        name: 'SPRM',
        logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_the_Malaysian_Anti-Corruption_Commission.svg/960px-Logo_of_the_Malaysian_Anti-Corruption_Commission.svg.png?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=thumbnail&_=20150505083652',
        layout: 'stacked',
    },
    {
        name: 'Minister of Finance Inc.',
        logo: 'https://images.seeklogo.com/logo-png/17/1/ministry-of-finance-malaysia-logo-png_seeklogo-176217.png',
        layout: 'stacked',
    },
    {
        name: 'Kementerian Kesihatan Malaysia',
        logo: 'https://images.seeklogo.com/logo-png/61/1/kkm-kami-sedia-membantu-logo-png_seeklogo-613127.png',
        layout: 'stacked',
    },
];

function onImgError(event) {
    const el = event.target;
    el.onerror = null;
    el.src = 'https://placehold.co/160x80?text=Logo';
    el.classList.add('logo-img--fallback');
}
</script>

<style scoped>
.footer-root {
    width: 100%;
}

.collab {
    width: 100%;
    background: #ffffff;
    padding: 48px 16px 48px;
}

.collab-header {
    text-align: center;
    margin-bottom: 40px;
}

.collab-title {
    margin: 0 0 16px;
    font-family: 'DM Sans', sans-serif;
    font-size: clamp(1.75rem, 4vw, 2.25rem);
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: #ea580c;
}

.collab-lead {
    margin: 0 auto;
    max-width: 32rem;
    font-family: 'DM Sans', sans-serif;
    font-size: 1rem;
    line-height: 1.65;
    color: #6b7280;
}

.collab-rule {
    margin-top: 24px;
    border-top: 1px solid #e5e7eb;
    max-width: 100%;
}

.logo-row {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 40px;
    max-width: 64rem;
    margin: 0 auto 48px;
}

.logo-row--second {
    margin-bottom: 0;
}

.logo-cell {
    display: flex;
    align-items: center;
    justify-content: center;
}

.logo-cell--stacked {
    flex-direction: column;
    width: 9rem;
    gap: 8px;
}

.logo-cell--inline {
    flex-direction: row;
    width: 13rem;
    gap: 12px;
}

.logo-img {
    object-fit: contain;
}

.logo-img--tall {
    height: 5rem;
}

.logo-img--inline {
    height: 4rem;
    flex-shrink: 0;
}

.logo-img--fallback {
    border-radius: 4px;
    border: 1px solid #e5e7eb;
    background: #f9fafb;
    padding: 8px;
}

.bottom-bar {
    border-top: 1px solid #e4e4e7;
    background: #f5f5f5;
}

.bottom-inner {
    max-width: 1280px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 12px 32px;
}

@media (min-width: 1024px) {
    .bottom-inner {
        padding-left: 56px;
        padding-right: 56px;
    }
}

.bottom-text {
    margin: 0;
    font-family: 'DM Sans', sans-serif;
    font-size: 12px;
    color: #71717a;
}

</style>
