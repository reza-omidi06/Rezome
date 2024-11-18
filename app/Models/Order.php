<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'plan_id',
        'order_name',
        'order_mail',
        'order_phone',
        'order_description',
        'order_file',
        'order_status',
    ];
    public function plan(){
        return $this->belongsTo(PlanType::class,'plan_id','id');
    }

}
