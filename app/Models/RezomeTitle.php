<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RezomeTitle extends Model
{
    protected $fillable =[
        'title',
        'sub_title',
    ];
    use HasFactory;
}
