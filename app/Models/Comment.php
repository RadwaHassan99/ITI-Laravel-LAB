<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Comment extends Model
{
    use HasFactory;
    public function commentable()
    {
        return $this->morphTo();
    }
    public function getHumanReadableDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
}
