<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable=[
        'title',
        'title_en',
        'description_services',
        'icon_services',
        'image_services',
        'status_services',
    ];
    use HasFactory;

}
