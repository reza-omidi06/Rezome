<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturesPlans extends Model
{
    protected $fillable=[
        'plan_type_id',
        'features',
        'feature_description',
    ];
    use HasFactory;

    public function plans(){
        return $this->belongsTo(PlanType::class,'plan_type_id','id');
    }
}
