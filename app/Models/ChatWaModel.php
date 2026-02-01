<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatWaModel extends Model
{
    protected $table = 'chat_was';
    protected $fillable = [
        'nama',
        'jabatan',
        'no_whatsapp',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
