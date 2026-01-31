<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->nullable();
            $table->foreignId('employee_id')->constrained('employees')->nullable();
            $table->foreignId('service_id')->constrained('services')->nullable();
            $table->datetime('scheduled_at');
            $table->datetime('end_at');
            $table->tinyInteger('payment_status')->default(0);
            $table->decimal('total_price',10,2)->default(0.00);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
