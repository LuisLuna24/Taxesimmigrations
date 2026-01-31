<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'email',
        'name',
        'comment',
        'status',
        'ip_address',
        'user_id'
    ];

    protected $casts = [
        'status' => 'integer', // O mapearlo a un Enum si lo creas
    ];
}
