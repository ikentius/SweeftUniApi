<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::Class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
