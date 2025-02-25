<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;
    protected $fillable = ['medication_name', 'description', 'dosage'];
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}
