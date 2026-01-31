<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = [
        'appointment_id',
        'user_id',
        'gateway',
        'transaction_id',
        'amount',
        'currency',
        'status',
        'payload'
    ];

    protected $casts = [
        'payload' => 'array', // Para manejar el JSON de Stripe/PayPal
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
