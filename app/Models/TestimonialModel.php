<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialModel extends Model
{
    protected $table = 'testimonials';

    // Mass assignment
    protected $fillable = [
        'avatar',
        'name',
        'angkatan',
        'program_studi',
        'quote',
        'is_active',
    ];

    // Casting tipe data
    protected $casts = [
        'angkatan'   => 'integer',
        'is_active' => 'boolean',
    ];
}
