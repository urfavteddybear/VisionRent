<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class VerificationResultNotification extends Notification
{
    use Queueable;

    protected bool $isVerified;
    protected ?string $rejectionReason;

    public function __construct(bool $isVerified, ?string $rejectionReason = null)
    {
        $this->isVerified = $isVerified;
        $this->rejectionReason = $rejectionReason;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        if ($this->isVerified) {
            return (new MailMessage)
                ->subject('Verifikasi Data Berhasil')
                ->line('Selamat! Data Anda telah berhasil diverifikasi.')
                ->line('Sekarang Anda dapat menggunakan seluruh layanan kami.')
                ->action('Kunjungi Dashboard', url('/dashboard'));
        }

        return (new MailMessage)
            ->subject('Verifikasi Data Ditolak')
            ->line('Maaf, verifikasi data Anda tidak dapat kami proses.')
            ->line('Alasan:')
            ->line($this->rejectionReason)
            ->line('Silakan perbaiki data Anda dan kirim ulang verifikasi.')
            ->action('Kirim Ulang Verifikasi', url('/verification'));
    }
}
