<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'specialization', 'working_hours', 'years_of_experience', 'department'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
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
