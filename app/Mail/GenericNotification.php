<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GenericNotification extends Mailable
{
    use Queueable, SerializesModels;


    public $message;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $message
     * @return void
     */
    public function __construct($message)
    {
     
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notification from our platform')
                    ->view('admin.setting.notifications.emails')->with(['message' => $this->message]);; // يمكنك تغيير هذا إلى المسار الذي يحتوي على القالب المناسب
    }
}
