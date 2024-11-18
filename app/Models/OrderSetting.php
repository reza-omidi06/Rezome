<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSetting extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_setting_title_up_title',
        'order_setting_title',
        'order_setting_description',
        'order_setting_back_color',
        'order_setting_btn_color',
        'order_setting_back_image',
        'order_setting_back_attachment',
    ];
}
