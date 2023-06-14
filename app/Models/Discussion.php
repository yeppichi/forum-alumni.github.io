<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $table = "discussion";
    protected $fillable = [
        'avatar_id',
        'sender_id',
        'topic_id',
        'image',
        'content',
        'replies_id',
        // 'likes_count',
        // 'like_by_id',
    ];

    public function sender(){
        return $this->belongsTo(User::class);
    }

    public function topic(){
        return $this->belongsTo(Topics::class);
    }

    public function reply(){
        return $this->hasMany(Replies::class);
    }

    public function avatar(){
        return $this->belongsTo(User::class);
    }

    public function like(){
        return $this->hasMany(LikeDiscussion::class);
    }
}
