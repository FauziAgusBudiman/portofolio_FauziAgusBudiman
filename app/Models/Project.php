<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'technologies',
        'features',
        'image',
        'demo_url',
        'github_url',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Auto-generate slug when creating if not provided
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title) . '-' . Str::random(5);
            }
        });
    }

    // Helper to get technologies as an array
    public function getTechArrayAttribute(): array
    {
        if (empty($this->technologies)) {
            return [];
        }
        return array_map('trim', explode(',', $this->technologies));
    }

    // Helper to get features as an array (line by line or comma separated)
    public function getFeatureArrayAttribute(): array
    {
        if (empty($this->features)) {
            return [];
        }
        $lines = preg_split('/\r\n|\r|\n/', $this->features);
        return array_filter(array_map('trim', $lines));
    }
}
