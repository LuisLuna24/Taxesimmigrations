<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    protected $fillable = ['name_en', 'name_es', 'description_en', 'description_es', 'price', 'image', 'duration_minutes', 'status'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function subServices()
    {
        return $this->hasMany(SubService::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return asset('images/default-service.png');
    }
}
