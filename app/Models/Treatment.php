<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['treatment_name', 'description', 'cost'];
    public function treatmentSessions()
    {
        return $this->hasMany(TreatmentSession::class);
    }
}
