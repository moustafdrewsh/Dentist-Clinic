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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_status', ['paid', 'unpaid']);
            $table->date('issued_date');
            $table->date('payment_date')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
