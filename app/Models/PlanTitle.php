<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTitle extends Model
{
    protected $fillable=[
        'title',
        'sub_title',
    ];
    use HasFactory;
}
