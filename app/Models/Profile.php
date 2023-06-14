<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "profile";
    protected $fillable = [
        'user_id',
        'avatar_id',
        'categories_id',
        'department_id',
        'birth_date',
        'address',
        'activity_id',
        'biodata',
        'linkedin',
        'instagram',
        'twitter',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function avatar(){
        return $this->belongsTo(User::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function activity(){
        return $this->belongsTo(Activity::class);
    }
    
    public function categories(){
        return $this->belongsTo(Categories::class);
    }

    public function discussion(){
        return $this->hasMany(Discussion::class);
    }
}
