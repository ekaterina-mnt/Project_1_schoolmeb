<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
