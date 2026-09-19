import { ref } from 'vue';

const BASE_URL = import.meta.env.VITE_API_URL || 'http://localhost:8000';

/**
 * Generic fetch wrapper with loading + error state
 */
function useFetch(endpoint) {
    const data = ref(null);
    const loading = ref(false);
    const error = ref(null);

    async function execute(options = {}) {
        loading.value = true;
        error.value = null;
        try {
            const res = await fetch(`${BASE_URL}/api${endpoint}`, {
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                    ...options.headers,
                },
                ...options,
            });
            if (!res.ok) {
                throw new Error(`HTTP ${res.status}`);
            }
            data.value = await res.json();
        } catch (err) {
            error.value = err.message;
            console.error(`[API] ${endpoint}:`, err);
        } finally {
            loading.value = false;
        }
    }

    return { data, loading, error, execute };
}

// ── Packages ──────────────────────────────────
export function usePackages() {
    const { data: packages, loading, error, execute } = useFetch('/packages');

    async function fetchPackages() {
        await execute({ method: 'GET' });
    }

    return { packages, loading, error, fetchPackages };
}

// ── Menu Items ────────────────────────────────
export function useMenu() {
    const { data: menuItems, loading, error, execute } = useFetch('/menu');

    async function fetchMenu() {
        await execute({ method: 'GET' });
    }

    return { menuItems, loading, error, fetchMenu };
}

// ── Enquiry Submission ────────────────────────
export function useEnquiry() {
    const submitting = ref(false);
    const submitted = ref(false);
    const submitError = ref(null);

    async function submitEnquiry(formData) {
        submitting.value = true;
        submitError.value = null;
        try {
            const res = await fetch(`${BASE_URL}/api/enquiry`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                },
                body: JSON.stringify(formData),
            });
            if (!res.ok) {
                const errBody = await res.json();
                throw new Error(errBody.message || `HTTP ${res.status}`);
            }
            submitted.value = true;

            return true;
        } catch (err) {
            submitError.value = err.message;

            return false;
        } finally {
            submitting.value = false;
        }
    }

    return { submitting, submitted, submitError, submitEnquiry };
}

// ── WhatsApp Helper ───────────────────────────
export function buildWhatsAppUrl(formData) {
    const number = '60197705042'; // Enyfadz number — update as needed
    const msg = `Assalamualaikum Enyfadz Enterprise 👋

Saya ingin mendapatkan sebut harga katering:

👤 Nama: ${formData.nama || 'Tidak dinyatakan'}
📞 No. Telefon: ${formData.telefon || 'Tidak dinyatakan'}
🍛 Pakej: ${formData.pakej || 'Belum dipilih'}
📅 Tarikh Majlis: ${formData.tarikh || 'Belum ditetapkan'}
👥 Anggaran Pax: ${formData.pax || 'Belum dinyatakan'}${formData.mesej ? '\n\n💬 Mesej: ' + formData.mesej : ''}

Terima kasih!`;

    return `https://wa.me/${number}?text=${encodeURIComponent(msg)}`;
}
