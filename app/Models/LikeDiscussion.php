<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeDiscussion extends Model
{
    use HasFactory;

    protected $table = [
        'user_id',
        'discussion_id',
    ];

    public function discuss(){
        return $this->belongsTo(Discussion::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
