<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('treatment_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->foreignId('treatment_id')->constrained('treatments')->onDelete('cascade');
            $table->dateTime('session_datetime');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('treatment_sessions');
    }
};
