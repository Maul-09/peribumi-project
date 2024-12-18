<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class CustomVerifyEmailNotification extends VerifyEmail
{
    
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Verifikasi Email Anda')
            ->view('vendor.notifications.email', [
                'user' => $notifiable,
                'verificationUrl' => $this->verificationUrl($notifiable),
            ]);
    }
}
