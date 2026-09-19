<template>
    <section id="contact" class="section fade-up">
        <div class="section-inner">
            <h2 class="section-title">Hubungi kami</h2>
            <p class="intro">Isi borang di bawah atau hubungi kami terus melalui WhatsApp.</p>

            <form class="form" @submit.prevent="onSubmit">
                <label class="field">
                    <span>Nama</span>
                    <input v-model="form.nama" type="text" name="nama" autocomplete="name" />
                </label>
                <label class="field">
                    <span>No. telefon</span>
                    <input v-model="form.telefon" type="tel" name="telefon" autocomplete="tel" />
                </label>
                <label class="field">
                    <span>Pakej</span>
                    <input v-model="form.pakej" type="text" name="pakej" />
                </label>
                <label class="field">
                    <span>Tarikh majlis</span>
                    <input v-model="form.tarikh" type="text" name="tarikh" placeholder="DD/MM/YYYY" />
                </label>
                <label class="field">
                    <span>Anggaran pax</span>
                    <input v-model="form.pax" type="text" name="pax" />
                </label>
                <label class="field full">
                    <span>Mesej</span>
                    <textarea v-model="form.mesej" name="mesej" rows="4" />
                </label>

                <p v-if="submitError" class="error">{{ submitError }}</p>
                <p v-if="submitted" class="success">Terima kasih — borang telah dihantar.</p>

                <div class="actions">
                    <button type="submit" class="btn primary" :disabled="submitting">
                        {{ submitting ? 'Menghantar…' : 'Hantar' }}
                    </button>
                    <a
                        class="btn wa"
                        :href="buildWhatsAppUrl(form)"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        WhatsApp
                    </a>
                </div>
            </form>
        </div>
    </section>
</template>

<script setup>
import { reactive, onMounted } from 'vue';
import { useEnquiry, buildWhatsAppUrl } from '../composables/useApi.js';

const form = reactive({
    nama: '',
    telefon: '',
    pakej: '',
    tarikh: '',
    pax: '',
    mesej: '',
});

const { submitting, submitted, submitError, submitEnquiry } = useEnquiry();

async function onSubmit() {
    await submitEnquiry({ ...form });
}

onMounted(() => {
    const el = document.querySelector('#contact.fade-up');
    if (el) {
        const obs = new IntersectionObserver(
            (entries) => {
                entries.forEach((e) => {
                    if (e.isIntersecting) {
                        e.target.classList.add('visible');
                    }
                });
            },
            { threshold: 0.1 },
        );
        obs.observe(el);
    }
});
</script>

<style scoped>
.section {
    scroll-margin-top: 100px;
    padding: 80px 48px 100px;
}
.section-inner {
    max-width: 560px;
    margin: 0 auto;
}
.section-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.25rem;
    color: var(--dark);
    margin-bottom: 12px;
}
.intro {
    color: var(--mid);
    margin-bottom: 28px;
    line-height: 1.6;
}
.form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}
.field {
    display: flex;
    flex-direction: column;
    gap: 6px;
    font-size: 12px;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    color: var(--mid);
}
.field.full {
    grid-column: 1 / -1;
}
.field input,
.field textarea {
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    text-transform: none;
    letter-spacing: normal;
    padding: 12px 14px;
    border: 1px solid var(--border);
    border-radius: 8px;
    background: var(--white);
    color: var(--dark);
}
.field textarea {
    resize: vertical;
    min-height: 100px;
}
.error {
    grid-column: 1 / -1;
    color: #b91c1c;
    font-size: 14px;
}
.success {
    grid-column: 1 / -1;
    color: #15803d;
    font-size: 14px;
}
.actions {
    grid-column: 1 / -1;
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 8px;
}
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 24px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
    border: none;
    font-family: 'DM Sans', sans-serif;
}
.btn.primary {
    background: var(--orange);
    color: white;
}
.btn.primary:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
.btn.wa {
    background: #25d366;
    color: white;
}
@media (max-width: 640px) {
    .form {
        grid-template-columns: 1fr;
    }
}
</style>
