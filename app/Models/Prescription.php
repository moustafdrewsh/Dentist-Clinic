<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'doctor_id', 'medication_id', 'dosage', 'issued_date'];

    // إضافة خاصية casts لتحويل issued_date إلى كائن Carbon
    protected $casts = [
        'issued_date' => 'datetime',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function medication()
    {
        return $this->belongsTo(Medication::class);
    }
}
