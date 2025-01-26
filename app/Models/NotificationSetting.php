<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSetting extends Model
{
    use HasFactory;

    protected $fillable = ['notification_type', 'enabled' , 'notification_type_id'];

  

    public function notificationType()
    {
        return $this->belongsTo(NotificationType::class , 'notification_type_id');
    }


}
