<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextPost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function textComment(){
        return $this->hasMany(TextComment::class)->orderBy('created_at', 'DESC');
    }

    public function textPostLikes(){
        return $this->hasMany(TextPostLikes::class);
    }

    public function textPostDislikes(){
        return $this->hasMany(TextPostDislikes::class);
    }
}
