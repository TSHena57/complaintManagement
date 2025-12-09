<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class CustomVerifyEmail extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Please Verify Your Email')
            ->view('emails.verify', [
                'url' => $verificationUrl,
                'user' => $notifiable,
            ]);
    }

    /**
     * Generate the verification URL
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',      // default Laravel route name
            Carbon::now()->addMinutes(60), // expiry time
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->email),
            ]
        );
    }
}
