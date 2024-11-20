<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContinerSetting extends Model
{
    use HasFactory;
    protected $fillable=[
        'up_title',
        'up_title_color',
        'title',
        'title_color',
        'cont_description',
        'cont_link',
        'cont_background_color',
        'cont_btn_color',
        'cont_background_image',
        'cont_background_attachment',
    ];
}
