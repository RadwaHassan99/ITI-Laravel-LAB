<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo(related:User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


}
