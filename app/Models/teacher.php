<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    
    protected $fillable = [
    'name',
    'email',
    'password',
    'expertise_area'
    ];

   protected $hidden = [
    'password'
  ];

  protected $casts = [
    'password' => 'hashed'
  ];
}