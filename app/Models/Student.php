<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function major()
    {
        return $this->hasOne(Major::class);
    }

    public function course()
    {
        return $this->hasOne(Course::class);
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class);
    }
}
