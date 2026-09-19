<template>
    <section id="menu" class="section fade-up">
        <div class="section-inner">
            <h2 class="section-title">Menu</h2>
            <p v-if="loading" class="muted">Memuatkan menu…</p>
            <p v-else-if="error" class="error">{{ error }}</p>
            <ul v-else-if="menuList.length" class="list">
                <li v-for="(item, idx) in menuList" :key="idx" class="list-item">
                    {{ formatItem(item) }}
                </li>
            </ul>
            <pre v-else-if="menuItems" class="raw">{{ JSON.stringify(menuItems, null, 2) }}</pre>
            <p v-else class="muted">Tiada data menu.</p>
        </div>
    </section>
</template>

<script setup>
import { computed, onMounted } from 'vue';
import { useMenu } from '../composables/useApi.js';

const { menuItems, loading, error, fetchMenu } = useMenu();

const menuList = computed(() => {
    const m = menuItems.value;
    if (! m) {
        return [];
    }
    if (Array.isArray(m)) {
        return m;
    }
    if (m && Array.isArray(m.data)) {
        return m.data;
    }

    return [];
});

function formatItem(item) {
    if (typeof item === 'string') {
        return item;
    }
    if (item && typeof item === 'object') {
        return item.name || item.title || item.label || JSON.stringify(item);
    }

    return String(item);
}

onMounted(() => {
    fetchMenu();
    const el = document.querySelector('#menu.fade-up');
    if (el) {
        const obs = new IntersectionObserver(
            (entries) => {
                entries.forEach((e) => {
                    if (e.isIntersecting) {
                        e.target.classList.add('visible');
                    }
                });
            },
            { threshold: 0.12 },
        );
        obs.observe(el);
    }
});
</script>

<style scoped>
.section {
    scroll-margin-top: 100px;
    padding: 80px 48px;
    border-bottom: 1px solid var(--border);
}
.section-inner {
    max-width: 900px;
    margin: 0 auto;
}
.section-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.25rem;
    color: var(--dark);
    margin-bottom: 24px;
}
.muted {
    color: var(--mid);
}
.error {
    color: #b91c1c;
}
.list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.list-item {
    padding: 16px 20px;
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 10px;
    color: var(--mid);
}
.raw {
    font-size: 12px;
    overflow: auto;
    padding: 16px;
    background: var(--white);
    border-radius: 10px;
    border: 1px solid var(--border);
}
</style>
