<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'issuer',
        'issue_date',
        'score_or_credential',
        'credential_url',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}
