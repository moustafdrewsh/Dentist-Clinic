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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->foreignId('medication_id')->constrained('medications')->onDelete('cascade');
            $table->string('dosage');
            $table->date('issued_date');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
};
