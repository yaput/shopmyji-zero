<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ProductionOrder extends Model
{
    protected static function boot() {
        parent::boot();
    
        static::saving(function($model){
            $model->total_net = ProductionOrder::calculateTotalNet($model->price_each, $model->total, $model->discount, $model->delivery_fee);
        }); 
    }

    private static function calculateTotalNet(float $price_each, float $total, float $discount, float $delivery_fee) {
        $total_gross = $price_each * $total;
        $total_discounted = $total_gross - $discount;
        $total_net = $total_discounted + $delivery_fee;

        return $total_net;
    }
}
