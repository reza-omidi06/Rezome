<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'name',
        'text_dynamic',
        'btn_name_one',
        'btn_link_one',
        'btn_name_tow',
        'btn_link_tow',
        'image',
        'image_alt',
        'background_img',
        'background_color',
        ];
    use HasFactory;
}
