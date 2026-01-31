<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubService extends Model
{
    use HasFactory;
    protected $table = 'sub_services';

    protected $fillable = [
        'service_id',
        'name_en',
        'name_es',
        'description_en',
        'description_es',
        'status'
    ];

    /**
     * Relación: Un sub-servicio pertenece a un servicio principal.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
