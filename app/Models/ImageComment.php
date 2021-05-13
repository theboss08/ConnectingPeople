<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageComment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function imagePost(){
        return $this->belongsTo(ImagePost::class);
    }
}
