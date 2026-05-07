<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title',
        'hero_image',
        'who_we_are',
        'mission_title',
        'mission_description',
        'vision_title',
        'vision_description',
        'story_title',
        'story_content',
        'story_image',
    ];
}