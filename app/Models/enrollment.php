<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enrollment extends Model
{
    use HasFactory;
    protected $table = 'enrollment';
    protected $fillable = [
        'user_id',
        'course_id',
    ];
}
