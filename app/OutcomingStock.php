<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductPrice;
use App\Channel;


class OutcomingStock extends Model
{
    protected static function boot() {
        parent::boot();
        static::saving(function($model){
            $product_price = ProductPrice::find($model->price_id);
            $price_times_total_items = $product_price->price * $model->total_item;
            $discount = $price_times_total_items - $model->bundling_disc - $model->add_disc;
            // TODO: ENDORSEMENT FEE??
            
            // Count Fee based on channel
            $total_net = $discount;
            // Decide use percentage or fixed
            if (!is_null($model->channel_id)) {
                $channel = Channel::find($model->channel_id);
                if ($channel->fee_percentage > 0) {
                    $total_net = $discount - ($discount * $channel->fee_percentage / 100);
                } else {
                    $total_net = $discount - $channel->fee_fixed;
                }
            } 
            $model->total_net = $total_net;
        }); 
    }
}
