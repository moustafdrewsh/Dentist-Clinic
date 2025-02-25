<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentSession extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id', 'doctor_id', 'treatment_id', 'session_datetime', 'notes'];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }
}
