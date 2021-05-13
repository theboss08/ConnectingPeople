<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot(){
        parent::boot();
        static::created(function ($user) {
            $user->profile()->create([
                'bio' => 'Hello i am ' . $user->name . '.',
            ]);
        });
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function textPost(){
        return $this->hasMany(TextPost::class)->orderBy('created_at', 'DESC');
    }
    public function imagePost(){
        return $this->hasMany(ImagePost::class)->orderBy('created_at', 'DESC');
    }
    public function videoPost(){
        return $this->hasMany(VideoPost::class)->orderBy('created_at', 'DESC');
    }

    public function textComment(){
        return $this->hasMany(TextComment::class)->orderBy('created_at', 'DESC');
    }

    public function imageComment(){
        return $this->hasMany(ImageComment::class)->orderBy('created_at', 'DESC');
    }
}
