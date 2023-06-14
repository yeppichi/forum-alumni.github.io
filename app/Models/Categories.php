<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'image',
        'school_generation',
        'start_year',
        'end_year',
    ];

    public function profile(){
        return $this->hasMany(Profile::class);
    }
}
