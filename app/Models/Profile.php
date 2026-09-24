<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'headline',
        'sub_headline',
        'bio',
        'about_text',
        'avatar',
        'cv_file',
        'email',
        'phone',
        'whatsapp',
        'location',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
    ];
}
