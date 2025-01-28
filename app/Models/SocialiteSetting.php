<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialiteSetting extends Model
{
    protected $fillable = [
        'google_client_id',
        'google_client_secret',
        'google_callback_redirect',
        'facebook_client_id',
        'facebook_client_secret',
        'facebook_callback_redirect',
    ];
}
