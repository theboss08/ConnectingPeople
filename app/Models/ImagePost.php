<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function imageComment(){
        return $this->hasMany(ImageComment::class)->orderBy('created_at', 'DESC');
    }
    public function ImagePostLikes(){
        return $this->hasMany(ImagePostLikes::class);
    }

    public function imagePostDislikes(){
        return $this->hasMany(ImagePostDislikes::class);
    }
}
