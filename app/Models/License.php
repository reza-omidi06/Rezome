<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $fillable =[
        'name',
        'lastname',
        'field_of_activity',
        'company_name',
        'licence_code',
    ];
    use HasFactory;
}
