<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shopping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());

$products = $request->product_id;
$colors = $request->color_id;
$qty = $request->qty;

// dd($products);

foreach($products as $key => $product){
    Order::create([
        'product_id'  => $products[$key],
        'color_id' => $colors[$key],
        'qty' => $qty[$key],
        'user_id' => auth()->user()->id,
        'status' => 0,
    ]);
}
//update shopping cart

Shopping::whereIn('product_id', $request->product_id)
->where('user_id', auth()->user()->id)
        ->update([
            'is_ordered' => 1,
        ]);


return redirect()->back();
    }
}
