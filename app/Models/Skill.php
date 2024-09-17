<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable =[
        'skill_name',
        'skill_name_en',
        'skill_percentage',
        'description',
    ];
    use HasFactory;
}
