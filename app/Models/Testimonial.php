<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable=[
        'testimonial_image',
        'testimonial_customer',
        'testimonial_comment',
        'testimonial_mail',
        'testimonial_phone',
        'testimonial_profession',
        'testimonial_status',

    ];
    use HasFactory;
}
