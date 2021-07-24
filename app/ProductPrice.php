<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MasterProduct;
use App\MasterSize;


class ProductPrice extends Model
{
    protected static function boot() {
        parent::boot();
        static::saving(function($model){
            $product = MasterProduct::find($model->product_id);
            $size = MasterSize::find($model->size_id);
            $model->product_size_price_name = $product->product_code . '-' . $size->size . '-' . $model->price;
        }); 
    }
}
