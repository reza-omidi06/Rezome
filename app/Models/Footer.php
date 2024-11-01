<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable=[
        'footer_name',
        'footer_address',
        'footer_email',
        'footer_phone',
        'footer_social_instagram',
        'footer_social_facebook',
        'footer_social_whatsapp',
        'footer_social_telegram',
        'footer_social_x',
        'footer_social_linkedin',
        'footer_social_youtube',
        'footer_social_apparat',
        'footer_copy_right',
    ];
    use HasFactory;
}
