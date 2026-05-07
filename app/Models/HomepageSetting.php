<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    protected $fillable = [
        'hero_badge', 'hero_title', 'hero_description','hero_video',
        'services_title', 'services_description',
        'why_us_title', 'why_us_description',
        'cta_title', 'cta_description',
        'stat_1_number', 'stat_1_suffix', 'stat_1_label',
        'stat_2_number', 'stat_2_suffix', 'stat_2_label',
        'stat_3_number', 'stat_3_suffix', 'stat_3_label',
        'stat_4_number', 'stat_4_suffix', 'stat_4_label',
        // NEW PROCESS FIELDS
        'process_title', 'process_description',
        'process_1_title', 'process_1_icon', 'process_1_description',
        'process_2_title', 'process_2_icon', 'process_2_description',
        'process_3_title', 'process_3_icon', 'process_3_description',
        'process_4_title', 'process_4_icon', 'process_4_description',
        'typewriter_phrases',

        'what_we_do_title',
        'what_we_do_description',
        'what_we_do_cards',
    ];

    // ADD THIS CASTS ARRAY SO LARAVEL KNOWS IT IS A LIST:
    protected $casts = [
        'typewriter_phrases' => 'array',
        'what_we_do_cards' => 'array', // <-- Add this!
    ];
}