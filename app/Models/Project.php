<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // This array tells Laravel: "It is safe to save data to these columns from a form"
    protected $fillable = [
        'title',
        'category',
        'client_name',
        'project_link',
        'image',
        'description',
    ];
}