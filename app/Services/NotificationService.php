<?php

namespace App\Services;

use App\Mail\GenericNotification;
use App\Models\NotificationSetting;
use App\Models\NotificationType;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotificationService
{
    // notficationSetting -> 


    public static function cheackNotfication($type, $message)
    {

        // notification_type
        // parint
        // sms - email - pusher 
        $notficationSettings = NotificationSetting::where('notification_type', $type)->get();
        foreach ($notficationSettings as $notificationSetting) {


            if ($notificationSetting->notification_type == 'email' && $notificationSetting->enabled) {

                self::sendEmailNotificationRegister( $message);
            }

            if ($notificationSetting->notification_type == 'pusher' && $notificationSetting->enabled) {

                // self::sendPusherNotification($user, $message);
            }
            if ($notificationSetting->notification_type == 'sms' && $notificationSetting->enabled) {

                // self::sendSMSNotification($user, $message);
            }
        }
        self::storeNotificationType($type);
    }


    // email
    public static function sendEmailNotificationRegister($message)
    {
        Mail::to('moustaf.drewsh099@gmail.com')->send(new GenericNotification($message));
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
    public static function sendSMSNotification($user, $message)
    {
        // تحقق مما إذا كنت تستخدم Pusher، ثم أرسل الإشعار عبر Pusher
        // تأكد من تكامل Pusher مع التطبيق لديك
        // مثال بسيط:
        // broadcast(new \App\Events\NotificationEvent($user, $message)); 
    }





    public static function storeNotificationType($notificationType)
    {
        $notificationTypeObj = NotificationType::firstOrCreate(['name' => $notificationType]);

        NotificationSetting::updateOrCreate(
            ['notification_type' => $notificationTypeObj->name],
            ['enabled' => true, 'notification_type_id' => $notificationTypeObj->id]
        );
    }
    public static function logNotification($user, $message)
    {
        Log::info("Notification sent to {$user->email}: {$message}");
    }
}
