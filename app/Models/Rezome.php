<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezome extends Model
{
    protected $fillable=[
        'jobـposition',
        'jobـposition_en',
        'title',
        'description_rezome',
        'Jobـstartـdate',
        'Jobـendـdate',
        'status',
    ];
    use HasFactory;
}
