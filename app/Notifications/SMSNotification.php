<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;

class SMSNotification extends Notification
{
    use Queueable;

    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['vonage'];
    }

    public function toVonage($notifiable)
    {
        return (new VonageMessage)
            ->content($this->message)
            ->from(config('services.vonage.sms_from'));
    }
}
