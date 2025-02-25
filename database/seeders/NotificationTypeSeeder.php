<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationType;

class NotificationTypeSeeder extends Seeder
{
    public function run()
    {
        NotificationType::create([
            'name' => 'email',
        ]);
        NotificationType::create([
            'name' => 'sms',
        ]);
        NotificationType::create([
            'name' => 'pusher',
        ]);
        NotificationType::create([
            'name' => 'slack',
        ]);
    }
}
