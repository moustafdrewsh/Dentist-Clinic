<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('notify-sham', function ($user) {
    return $user && $user->hasRole('admin');  
});
