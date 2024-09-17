<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable=[
        'title',
        'description',
        'image_about',
        'btn_name',
        'file_pdf',
    ];
    use HasFactory;

}
