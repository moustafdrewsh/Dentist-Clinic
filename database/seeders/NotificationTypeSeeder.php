<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationType;

class NotificationTypeSeeder extends Seeder
{
    public function run()
    {
        NotificationType::create([
            'name' => 'app-pusher',
            'display_name' => 'Pusher Notifications',
            'description' => 'Real-time notifications using Pusher'
        ]);
    }
}
