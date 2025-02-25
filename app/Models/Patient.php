<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'registration_date', 'medical_notes'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function treatmentSessions()
    {
        return $this->hasMany(TreatmentSession::class);
    }
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}
