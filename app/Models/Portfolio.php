<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'portfolio_category_id',
        'portfolio_name',
        'portfolio_client',
        'portfolio_project_date',
        'portfolio_url',
        'portfolio_image',
        'portfolio_description',
    ];
    use HasFactory;

    public function category(){
        return $this->belongsTo(PortfolioCategory::class,'portfolio_category_id','id');
    }
}
