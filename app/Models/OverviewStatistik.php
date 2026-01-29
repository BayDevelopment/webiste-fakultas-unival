<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OverviewStatistik extends Model
{
    protected $table = 'overview_statistik';

    protected $fillable = [
        'icon',
        'judul',
        'value',
        'show_plus',
    ];

    protected $casts = [
        'show_plus' => 'boolean',
        'value' => 'integer',
    ];
}
