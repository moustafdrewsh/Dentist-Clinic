<?php

namespace App\Services;

use App\Mail\GenericNotification;
use App\Models\NotificationSetting;
use App\Models\NotificationType;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class NotificationService
{
    // notficationSetting -> 


    public static function cheackNotfication($type, $method, $message)
    {
        $notificationType = NotificationType::where('name', $method)->first();
    
        if (!$notificationType) {
            Log::error("NotificationType '{$method}' is missing in the database.");
            return; 
        }
    
        $notificationSetting = NotificationSetting::where('notification_type_id', $notificationType->id)
            ->where('notification_type', $type)
            ->first();
    
        if (!$notificationSetting) {
            NotificationSetting::updateOrCreate(
                [
                    'notification_type' => $type, 
                    'notification_type_id' => $notificationType->id,
                ],
                [
                    'enabled' => true,
                ]
            );
        }
    
        if ($notificationSetting && $notificationSetting->enabled) {
            if ($notificationSetting->notification_type === 'email') {
                self::sendEmailNotificationRegister($method, $message);
            } elseif ($notificationSetting->notification_type === 'sms') {
                $toPhoneNumber = $notificationSetting->phone_number ?? env('TWILIO_PHONE_NUMBER');

                self::sendSMSNotification($toPhoneNumber, $message);
            } elseif ($notificationSetting->notification_type === 'pusher') {
                self::sendPusherNotification(null, $message);
            }
        }
    }
    
    

    // email
    public static function sendEmailNotificationRegister($type, $message)
    {
        Mail::to('moustaf.drewsh099@gmail.com')->send(new GenericNotification($message));
        self::storeNotificationType($type, 'email');
    }


    // pusher
    public static function sendPusherNotification($user, $message)
    {
        // تحقق مما إذا كنت تستخدم Pusher، ثم أرسل الإشعار عبر Pusher
        // تأكد من تكامل Pusher مع التطبيق لديك
        // مثال بسيط:
        // broadcast(new \App\Events\NotificationEvent($user, $message)); 
    }


    // sms
    public static function sendSMSNotification($toPhoneNumber, $message)
    {
        try {
            $sid = env('TWILIO_SID');
            $authToken = env('TWILIO_AUTH_TOKEN');
            $twilioNumber = env('TWILIO_PHONE_NUMBER');

            if (!$sid || !$authToken || !$twilioNumber) {
                throw new \Exception('Twilio credentials are not set in the .env file.');
            }

            $client = new Client($sid, $authToken);

            $client->messages->create(
                $toPhoneNumber,
                [
                    'from' => $twilioNumber,
                    'body' => $message,
                ]
            );

            Log::info("SMS sent to {$toPhoneNumber}: {$message}");
        } catch (\Exception $e) {
            Log::error("Failed to send SMS via Twilio: " . $e->getMessage());
        }
    }

    public static function storeNotificationType($type, $method = null)
    {
        $notificationTypeObj = NotificationType::where('name', $type)->first();
    
        if (!$notificationTypeObj) {
            Log::error("NotificationType '{$type}' is missing in the database.");
            return; // لا تُنشئ القيم تلقائيًا
        }
    
        NotificationSetting::updateOrCreate(
            [
                'notification_type' => $method ?? $type,
                'notification_type_id' => $notificationTypeObj->id,
            ],
            [
                'enabled' => true,
            ]
        );
    }
    
    public static function logNotification($user, $message)
    {
        Log::info("Notification sent to {$user->email}: {$message}");
    }
}
