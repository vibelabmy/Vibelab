<template>
    <section id="hero" class="hero">
        <!-- Background gradients -->
        <div class="hero-bg" aria-hidden="true" />

        <!-- Dark diagonal panel (right side) -->
        <div class="hero-panel" aria-hidden="true">
            <div class="hero-panel-img" />
        </div>

        <!-- ── LEFT CONTENT ── -->
        <div class="hero-left">
            <!-- Animated badge -->
            <div class="hero-badge">
                <span class="badge-dot" aria-hidden="true" />
                Katering Premium Malaysia
            </div>

            <!-- Main title -->
            <h1 class="hero-title">
                <span class="title-italic">Katering</span>
                <br />
                <span class="title-bold">Untuk Setiap Majlis</span>
            </h1>

            <p class="hero-desc">
                Hidangan berkualiti, rasa terbaik dan servis profesional untuk memenuhi keperluan majlis anda — dari majlis
                kecil hingga perkahwinan besar.
            </p>

            <!-- CTA buttons -->
            <div class="hero-actions">
                <button type="button" class="btn-primary" @click="scrollToPackages">
                    Lihat Pakej
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </button>
                <a class="btn-ghost" :href="whatsappUrl" target="_blank" rel="noopener noreferrer">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path
                            d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07
                     A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.67A2 2
                     0 012 1h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2
                     0 01-.45 2.11L6.91 8.38a16 16 0 006.72 6.72l1.73-1.73a2 2
                     0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"
                        />
                    </svg>
                    019-770 5042
                </a>
            </div>

            <!-- Stats row -->
            <div class="hero-stats">
                <div v-for="(stat, i) in stats" :key="i" class="stat-item">
                    <div class="stat-num">{{ stat.number }}</div>
                    <div class="stat-label">{{ stat.label }}</div>
                </div>
            </div>
        </div>

        <!-- ── RIGHT — FLOATING CARDS ── -->
        <div class="hero-right" aria-hidden="true">
            <!-- Card 1 — Package preview -->
            <div class="float-card card-1">
                <div class="card-icon">🍛</div>
                <div class="card-title">Pakej Perkahwinan</div>
                <div class="card-sub">Hidangan lengkap untuk hari istimewa anda</div>
                <div class="card-price">
                    RM8 – RM15
                    <span class="card-price-unit">/pax</span>
                </div>
            </div>

            <!-- Card 2 — Rating -->
            <div class="float-card card-2">
                <div class="card-icon">⭐</div>
                <div class="card-title">Rating Pelanggan</div>
                <div class="card-stars">
                    <span v-for="n in 5" :key="n" class="star">★</span>
                </div>
                <div class="card-sub card-sub-tight">Dipercayai lebih 500 pelanggan</div>
            </div>

            <!-- Card 3 — Trust badge -->
            <div class="float-card card-3">
                <div class="card-trust">
                    <div class="trust-icon">✓</div>
                    <div>
                        <div class="card-title">Servis Profesional</div>
                        <div class="card-sub">Pasukan berpengalaman</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { computed } from 'vue';
import { buildWhatsAppUrl } from '../composables/useApi.js';

const whatsappUrl = computed(() =>
    buildWhatsAppUrl({
        nama: '',
        telefon: '',
        pakej: '',
        tarikh: '',
        pax: '',
        mesej: 'Saya ingin bertanya tentang pakej katering Enyfadz.',
    }),
);

const stats = [
    { number: '500+', label: 'Majlis Berjaya' },
    { number: '8+', label: 'Tahun Pengalaman' },
    { number: '98%', label: 'Kepuasan Pelanggan' },
];

function scrollToPackages() {
    document.getElementById('packages')?.scrollIntoView({ behavior: 'smooth' });
}
</script>

<style scoped>
/* ── Layout ─────────────────────────────────── */
.hero {
    scroll-margin-top: 96px;
    min-height: 100vh;
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding-top: 80px;
    position: relative;
    overflow: hidden;
}

/* ── Background ─────────────────────────────── */
.hero-bg {
    position: absolute;
    inset: 0;
    background:
        radial-gradient(ellipse 60% 60% at 70% 50%, rgba(200, 90, 26, 0.08) 0%, transparent 70%),
        radial-gradient(ellipse 40% 40% at 20% 80%, rgba(184, 146, 42, 0.06) 0%, transparent 60%);
    pointer-events: none;
}

/* Dark diagonal panel */
.hero-panel {
    position: absolute;
    top: 0;
    right: 0;
    width: 52%;
    height: 100%;
    background: #1a1208;
    clip-path: polygon(12% 0, 100% 0, 100% 100%, 0 100%);
    overflow: hidden;
}
.hero-panel-img {
    position: absolute;
    inset: 0;
    background: url('https://images.unsplash.com/photo-1555244162-803834f70033?w=900&q=80') center / cover no-repeat;
    opacity: 0.3;
    mix-blend-mode: luminosity;
}

/* ── Left column ─────────────────────────────── */
.hero-left {
    padding: 80px 48px 80px 72px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    z-index: 2;
}

/* Badge */
.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 16px;
    border: 1px solid var(--border);
    border-radius: 100px;
    width: fit-content;
    font-size: 11px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--orange);
    font-weight: 500;
    margin-bottom: 28px;
}
.badge-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: var(--orange);
    flex-shrink: 0;
    animation: pulse 2s ease-in-out infinite;
}
@keyframes pulse {
    0%,
    100% {
        opacity: 1;
        transform: scale(1);
    }
    50% {
        opacity: 0.3;
        transform: scale(0.8);
    }
}

/* Title */
.hero-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(52px, 5vw, 80px);
    line-height: 1;
    color: var(--dark);
    margin-bottom: 24px;
}
.title-italic {
    display: block;
    font-weight: 300;
    font-style: italic;
    color: var(--orange);
}
.title-bold {
    display: block;
    font-weight: 600;
}

/* Description */
.hero-desc {
    font-size: 15px;
    line-height: 1.75;
    color: var(--mid);
    max-width: 400px;
    margin-bottom: 40px;
    font-weight: 300;
}

/* CTA buttons */
.hero-actions {
    display: flex;
    gap: 14px;
    align-items: center;
    flex-wrap: wrap;
}

.btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 15px 34px;
    background: var(--orange);
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0.04em;
    cursor: pointer;
    transition:
        background 0.25s,
        transform 0.25s,
        box-shadow 0.25s;
    font-family: 'DM Sans', sans-serif;
    text-decoration: none;
}
.btn-primary svg {
    transition: transform 0.25s;
}
.btn-primary:hover {
    background: var(--orange-light);
    transform: translateY(-2px);
    box-shadow: 0 12px 32px rgba(200, 90, 26, 0.25);
}
.btn-primary:hover svg {
    transform: translateX(4px);
}

.btn-ghost {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 15px 26px;
    background: transparent;
    color: var(--mid);
    border: 1px solid rgba(74, 53, 32, 0.2);
    border-radius: 10px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition:
        border-color 0.2s,
        color 0.2s,
        background 0.2s;
    font-family: 'DM Sans', sans-serif;
    text-decoration: none;
}
.btn-ghost:hover {
    border-color: var(--orange);
    color: var(--orange);
    background: var(--orange-pale);
}

/* Stats */
.hero-stats {
    display: flex;
    gap: 36px;
    margin-top: 52px;
    padding-top: 36px;
    border-top: 1px solid var(--border);
}
.stat-num {
    font-family: 'Cormorant Garamond', serif;
    font-size: 36px;
    font-weight: 600;
    color: var(--orange);
    line-height: 1;
}
.stat-label {
    font-size: 11px;
    color: var(--mid);
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-top: 4px;
    font-weight: 400;
}

/* ── Right column ────────────────────────────── */
.hero-right {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 80px 48px;
}

/* ── Floating cards ──────────────────────────── */
.float-card {
    position: absolute;
    background: white;
    border-radius: 18px;
    padding: 22px 24px;
    box-shadow: 0 24px 56px rgba(26, 18, 8, 0.18);
}

/* Card 1 — top-left of right column */
.card-1 {
    top: 16%;
    left: 2%;
    width: 260px;
    animation: floatA 4s ease-in-out infinite;
}
/* Card 2 — middle-right */
.card-2 {
    top: 44%;
    right: 2%;
    width: 240px;
    animation: floatB 4s ease-in-out infinite;
    animation-delay: 1.4s;
}
/* Card 3 — bottom-left, compact trust badge */
.card-3 {
    bottom: 16%;
    left: 10%;
    width: 220px;
    padding: 16px 18px;
    animation: floatA 4s ease-in-out infinite;
    animation-delay: 0.7s;
}

@keyframes floatA {
    0%,
    100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-10px);
    }
}
@keyframes floatB {
    0%,
    100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-8px);
    }
}

/* Card internals */
.card-icon {
    font-size: 24px;
    margin-bottom: 10px;
    line-height: 1;
}
.card-title {
    font-size: 13px;
    font-weight: 600;
    color: var(--dark);
    margin-bottom: 4px;
    line-height: 1.3;
}
.card-sub {
    font-size: 11.5px;
    color: var(--mid);
    line-height: 1.55;
    font-weight: 300;
}
.card-sub-tight {
    margin-top: 6px;
}
.card-price {
    font-family: 'Cormorant Garamond', serif;
    font-size: 22px;
    font-weight: 600;
    color: var(--orange);
    margin-top: 10px;
    line-height: 1;
}
.card-price-unit {
    font-size: 13px;
    color: var(--mid);
    font-family: 'DM Sans', sans-serif;
    font-weight: 300;
}
.card-stars {
    display: flex;
    gap: 2px;
    margin-top: 6px;
}
.star {
    color: #b8922a;
    font-size: 14px;
}

/* Card 3 trust layout */
.card-trust {
    display: flex;
    align-items: center;
    gap: 12px;
}
.trust-icon {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--orange);
    color: white;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-weight: 700;
}

/* ── Responsive ──────────────────────────────── */
@media (max-width: 900px) {
    .hero {
        grid-template-columns: 1fr;
        min-height: auto;
        padding-bottom: 60px;
    }
    .hero-panel {
        display: none;
    }
    .hero-left {
        padding: 100px 32px 48px;
    }
    .hero-right {
        display: none;
    }
    .hero-stats {
        gap: 24px;
    }
}

@media (max-width: 480px) {
    .hero-left {
        padding: 90px 24px 40px;
    }
    .hero-title {
        font-size: 44px;
    }
    .hero-actions {
        flex-direction: column;
        align-items: flex-start;
    }
    .btn-primary,
    .btn-ghost {
        width: 100%;
        justify-content: center;
    }
}

@media (prefers-reduced-motion: reduce) {
    .badge-dot,
    .card-1,
    .card-2,
    .card-3 {
        animation: none;
    }
}
</style>
