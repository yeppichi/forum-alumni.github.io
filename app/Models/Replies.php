<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'topic_id',
        'avatar_id',
        'discuss_id',
        'content',
        // 'likes_count',
        // 'like_by_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function avatar()
    {
        return $this->belongsTo(Profile::class);
    }

    public function topic(){
        return $this->belongsTo(Topics::class);
    }

    public function discussion(){
        return $this->belongsTo(Discussion::class);
    }

    // public function like_by(){
    //     return $this->belongsTo(User::class);
    // }
}
