<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionTranslations extends Model
{
   
    protected $fillable = [      
        'permission_id', 
        'language_id',
        'name',    
    ];
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

}
