<?php

declare(strict_types=1);

namespace App\Support;

/**
 * WhatsApp deep links for enquiry flow.
 * Kept in sync with {@see resources/js/demo2/composables/useApi.js} buildWhatsAppUrl().
 */
final class WhatsAppUrl
{
    private const ENQUIRY_NUMBER = '60197705042';

    /**
     * @param  array<string, string|null>  $formData
     */
    public static function buildEnquiryUrl(array $formData = []): string
    {
        $nama = self::field($formData, 'nama');
        $telefon = self::field($formData, 'telefon');
        $pakej = self::field($formData, 'pakej');
        $tarikh = self::field($formData, 'tarikh');
        $pax = self::field($formData, 'pax');
        $mesej = trim((string) ($formData['mesej'] ?? ''));

        $mesejBlock = $mesej !== '' ? "\n\n💬 Mesej: {$mesej}" : '';

        $message = <<<TEXT
Assalamualaikum Enyfadz Enterprise 👋

Saya ingin mendapatkan sebut harga katering:

👤 Nama: {$nama}
📞 No. Telefon: {$telefon}
🍛 Pakej: {$pakej}
📅 Tarikh Majlis: {$tarikh}
👥 Anggaran Pax: {$pax}{$mesejBlock}

Terima kasih!
TEXT;

        return 'https://wa.me/'.self::ENQUIRY_NUMBER.'?text='.rawurlencode($message);
    }

    /**
     * @param  array<string, string|null>  $formData
     */
    private static function field(array $formData, string $key): string
    {
        $raw = trim((string) ($formData[$key] ?? ''));

        if ($raw !== '') {
            return $raw;
        }

        return match ($key) {
            'pakej' => 'Belum dipilih',
            'tarikh' => 'Belum ditetapkan',
            'pax' => 'Belum dinyatakan',
            default => 'Tidak dinyatakan',
        };
    }
}
