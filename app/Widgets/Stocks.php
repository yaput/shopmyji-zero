<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;

use App\IncomingStock;
use App\OutcomingStock;
use App\DefectStock;
use App\MasterProduct;

class Stocks extends AbstractWidget
{
    // /**
    //  * The configuration array.
    //  *
    //  * @var array
    //  */
    // protected $config = [];

    // /**
    //  * Treat this method as a controller action.
    //  * Return view() or other content to display.
    //  */
    // public function run()
    // {
    //     $total_stock_per_product = [];
    //     $products = MasterProduct::select(array('id', 'product_name'))->get();
    //     foreach ($products as $product) {
    //         $total_incoming_stocks = DB::table('incoming_stocks')
    //             ->join('production_orders', 'incoming_stocks.po_id', '=', 'production_orders.id')
    //             ->join('master_products', 'incoming_stocks.product_id', '=', 'master_products.id')
    //             ->where('incoming_stocks.product_id', '=', $product->id)
    //             ->sum('incoming_stocks.total_receive');
    //         $total_stock_per_product[$product->product_name] = $total_incoming_stocks;
    //     };


    //     $string = "Products";
    //     return view('stocks_charts', [
    //         "products" => $products,
    //         "total_incoming_stocks" => $total_stock_per_product,
    //     ]);
    // }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return false;
    }
}
