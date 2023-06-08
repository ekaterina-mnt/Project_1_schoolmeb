<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subject',
        'price',
        'description',
        'teacher_id',
        'exam_type',
        'num_students',
        'img_src',
        'video_src'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
