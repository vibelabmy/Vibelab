<template>
    <nav :class="{ scrolled: isScrolled }">
        <div class="nav-logo">
            <div class="logo-mark">E</div>
            <div>
                <div class="logo-text">Enyfadz</div>
                <div class="logo-sub">Enterprise</div>
            </div>
        </div>

        <div class="nav-links">
            <a
                v-for="link in navLinks"
                :key="link.href"
                :href="link.href"
                :class="{ active: activeSection === link.id }"
                @click.prevent="scrollToSection(link.href)"
            >
                {{ link.label }}
            </a>
        </div>

        <button type="button" class="nav-cta nav-cta-desktop" @click="scrollToSection('#contact')">
            Dapatkan Sebut Harga
        </button>

        <!-- Mobile hamburger -->
        <button class="hamburger" type="button" @click="mobileOpen = !mobileOpen" aria-label="Menu">
            <span /><span /><span />
        </button>

        <!-- Mobile drawer -->
        <Transition name="drawer">
            <div v-if="mobileOpen" class="mobile-menu">
                <a
                    v-for="link in navLinks"
                    :key="link.href"
                    :href="link.href"
                    @click.prevent="
                        () => {
                            scrollToSection(link.href);
                            mobileOpen = false;
                        }
                    "
                >
                    {{ link.label }}
                </a>
                <button
                    type="button"
                    class="nav-cta"
                    @click="
                        () => {
                            scrollToSection('#contact');
                            mobileOpen = false;
                        }
                    "
                >
                    Dapatkan Sebut Harga
                </button>
            </div>
        </Transition>
    </nav>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const isScrolled = ref(false);
const activeSection = ref('hero');
const mobileOpen = ref(false);

const navLinks = [
    { href: '#hero', id: 'hero', label: 'Utama' },
    { href: '#packages', id: 'packages', label: 'Pakej' },
    { href: '#menu', id: 'menu', label: 'Menu' },
    { href: '#contact', id: 'contact', label: 'Hubungi Kami' },
];

function scrollToSection(selector) {
    document.querySelector(selector)?.scrollIntoView({ behavior: 'smooth' });
}

function onScroll() {
    isScrolled.value = window.scrollY > 40;

    // Update active nav link
    const sections = ['hero', 'packages', 'menu', 'contact'];
    for (const id of [...sections].reverse()) {
        const el = document.getElementById(id);
        if (el && window.scrollY >= el.offsetTop - 120) {
            activeSection.value = id;
            break;
        }
    }
}

onMounted(() => window.addEventListener('scroll', onScroll, { passive: true }));
onUnmounted(() => window.removeEventListener('scroll', onScroll));
</script>

<style scoped>
nav {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100;
    padding: 20px 48px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: rgba(250, 247, 242, 0.85);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid transparent;
    transition: all 0.3s;
}
nav.scrolled {
    border-bottom-color: var(--border);
    padding: 14px 48px;
}
.nav-logo {
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
}
.logo-mark {
    width: 40px;
    height: 40px;
    background: var(--orange);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Cormorant Garamond', serif;
    color: white;
    font-size: 20px;
    font-weight: 600;
}
.logo-text {
    font-family: 'Cormorant Garamond', serif;
    font-size: 18px;
    font-weight: 600;
    color: var(--dark);
}
.logo-sub {
    font-size: 10px;
    color: var(--orange);
    letter-spacing: 0.12em;
    text-transform: uppercase;
    font-weight: 500;
}

.nav-links {
    display: flex;
    gap: 36px;
    align-items: center;
}
.nav-links a {
    font-size: 13px;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    font-weight: 500;
    color: var(--mid);
    text-decoration: none;
    position: relative;
    padding-bottom: 2px;
    transition: color 0.2s;
}
.nav-links a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: var(--orange);
    transform: scaleX(0);
    transition: transform 0.3s;
    transform-origin: left;
}
.nav-links a:hover,
.nav-links a.active {
    color: var(--orange);
}
.nav-links a:hover::after,
.nav-links a.active::after {
    transform: scaleX(1);
}

.nav-cta {
    padding: 10px 24px;
    background: var(--orange);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    cursor: pointer;
    transition: all 0.2s;
    font-family: 'DM Sans', sans-serif;
}
.nav-cta:hover {
    background: var(--orange-light);
    transform: translateY(-1px);
}

/* Hamburger (mobile) */
.hamburger {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 4px;
}
.hamburger span {
    display: block;
    width: 24px;
    height: 2px;
    background: var(--dark);
    border-radius: 2px;
    transition: all 0.3s;
}

/* Mobile drawer */
.mobile-menu {
    position: fixed;
    top: 70px;
    left: 0;
    right: 0;
    background: var(--cream);
    border-bottom: 1px solid var(--border);
    padding: 24px 32px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.mobile-menu a {
    font-size: 16px;
    color: var(--mid);
    text-decoration: none;
    font-weight: 500;
    letter-spacing: 0.04em;
}
.drawer-enter-active,
.drawer-leave-active {
    transition: all 0.3s ease;
}
.drawer-enter-from,
.drawer-leave-to {
    opacity: 0;
    transform: translateY(-10px);
}

@media (max-width: 768px) {
    nav {
        padding: 16px 24px;
    }
    .nav-links,
    .nav-cta-desktop {
        display: none;
    }
    .hamburger {
        display: flex;
    }
}
</style>
