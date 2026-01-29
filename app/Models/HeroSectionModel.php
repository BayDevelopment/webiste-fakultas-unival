<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSectionModel extends Model
{
    protected $primaryKey = 'id_herosection';
    protected $table = 'hero_sections';
    protected $fillable = [
        'badge_text',
        'title',
        'subtitle',
        'description',
        'hero_image',
        'primary_button_label',
        'primary_button_url',
        'secondary_button_label',
        'secondary_button_url',
        'laboratory_count',
        'lecturer_practitioner_count',
        'industry_partner_count',
        'is_active'
    ];
}
