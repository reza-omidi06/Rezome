<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    protected $fillable=[
        'title_site',
        'image_site',
        'name_site',
        'description',
    ];
    use HasFactory;
}
