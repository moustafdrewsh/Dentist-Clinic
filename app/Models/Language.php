<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
        'name_in_english',
        'code',
        'app_file',
        'panel_file',
        'web_file',
        'rtl',
        'image'
    ];
}
