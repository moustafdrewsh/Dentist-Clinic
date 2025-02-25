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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('specialization');
            $table->string('working_hours');
            $table->integer('years_of_experience');
            $table->string('department')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
