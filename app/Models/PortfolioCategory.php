<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    protected $fillable =[
        'name_portfolio_category',
        'name_en_portfolio_category',
        'description_portfolio_category',
        'image_portfolio_category',
    ];
    use HasFactory;
}
