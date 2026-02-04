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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Relaciones
            $table->foreignId('appointment_id')
                ->constrained('appointments')
                ->onDelete('cascade'); // Si se borra la cita, se borra el rastro (opcional según auditoría)

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('restrict'); // Evita borrar usuarios con pagos realizados

            // Datos de la Transacción
            $table->string('gateway', 50)->comment('stripe, paypal');
            $table->string('transaction_id')->unique();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->string('status', 50)->comment('succeeded, failed, pending');

            // Auditoría y Log
            $table->json('payload')->nullable()->comment('Respuesta completa de la pasarela');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
