<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = [
        'name',      
        'slug',     
    ];

    public function translations() {
        return $this->hasMany(PermissionTranslations::class);
    }

    public function getName($locale = 'en') {
        $translation = $this->translations()->where('locale', $locale)->first();
        return $translation ? $translation->name : $this->name;
    }


    /// جلب كل الاobject الخاصة بالصلاحية
//    public function getTranslatedAttributes($locale = 'en')
//     {
//         $translation = $this->translations()->where('locale', $locale)->first();

//         return [
//             'name' => $translation ? $translation->name : $this->name,
//             'title' => $translation ? $translation->title : $this->title,
//             'second_name' => $translation ? $translation->second_name : $this->second_name,
//         ];
//     }

}
