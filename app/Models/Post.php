<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Tags\HasTags;


class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable, HasTags;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'slug'
    ];

    protected $dates = ['deleted_at'];
    protected $tagsField = 'tags';

    public function user()
    {
        return $this->belongsTo(related: User::class);
    }
    public function getHumanReadableDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function refreshSlug()
    {
        $this->slug = null;
        $this->save();
    }
}
