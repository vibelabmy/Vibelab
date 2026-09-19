<template>
    <section id="packages" class="section fade-up">
        <div class="section-inner">
            <h2 class="section-title">Pakej</h2>
            <p v-if="loading" class="muted">Memuatkan pakej…</p>
            <p v-else-if="error" class="error">{{ error }}</p>
            <ul v-else-if="packagesList.length" class="list">
                <li v-for="(item, idx) in packagesList" :key="idx" class="list-item">
                    {{ formatItem(item) }}
                </li>
            </ul>
            <pre v-else-if="packages" class="raw">{{ JSON.stringify(packages, null, 2) }}</pre>
            <p v-else class="muted">Tiada data pakej.</p>
        </div>
    </section>
</template>

<script setup>
import { computed, onMounted } from 'vue';
import { usePackages } from '../composables/useApi.js';

const { packages, loading, error, fetchPackages } = usePackages();

const packagesList = computed(() => {
    const p = packages.value;
    if (! p) {
        return [];
    }
    if (Array.isArray(p)) {
        return p;
    }
    if (p && Array.isArray(p.data)) {
        return p.data;
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
    fetchPackages();
    const el = document.querySelector('#packages.fade-up');
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
