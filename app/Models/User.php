<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Topics;
use App\Models\Replies;
use App\Models\PrivateMessage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'avatar',
        'level',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function private_message(){
        return $this->hasMany(PrivateMessage::class);
    }

    public function reply(){
        return $this->hasMany(Replies::class);
    }

    public function topic(){
        return $this->hasMany(Topics::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function discussion(){
        return $this->hasMany(Discussion::class);
    }

    public function like(){
        return $this->hasMany(LikeDiscussion::class);
    }
}
