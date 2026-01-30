<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $table = 'contact_settings';

    protected $fillable = [
        'page_title',
        'page_subtitle',
        'card_title',
        'card_description',

        'badge_1',
        'badge_2',
        'badge_3',

        'office_hours_label',
        'office_hours_time',

        'address_text',
        'contact_email',
        'contact_phone',
        'location_embed',

        'primary_button_text',
        'primary_button_url',

        'secondary_button_text',
        'secondary_button_url',

        'hero_image',

        'cta_title',
        'cta_subtitle',

        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
