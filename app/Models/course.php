<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $table = 'course';
    protected $fillable = [
        'course_title',
        'description',
        'teacher_id',
        'video_url',
        'image_url',
    ];
}
