<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bank_account',
        'level'
    ];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
