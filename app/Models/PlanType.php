<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanType extends Model
{
    protected $fillable=[
        'name_type_fa',
        'name_type_en',
        'price_type',
        'description_type',
        'status_type',
        'special',

    ];
    use HasFactory;

    public function features()
    {
        return $this->hasMany(FeaturesPlans::class, 'plan_type_id', 'id');
    }
}
