<?php

namespace App\Http\Controllers;

use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class ShoppingController extends Controller
{
    public function addShoppingCart(Request $request)
    {

        $user = auth()->user()->id;

// dd($request->all());

Shopping::create([
    'user_id' => $user,
    'color_id' => $request->color_id ?? null,
    'product_id' => $request->product_id,
    'qty' => $request->qty ?? null,
]);

return redirect()->back()->withSuccess('Add to Cart');
}

public function getShoppingProducts()
{
    $productAddToCart = Shopping::where('user_id', Auth::user()->id)
    ->where('is_ordered', 0)
    ->get()->count();
    $user = auth()->user()->id;
    $shoppingProducts = Shopping::where('user_id', $user)
->where('is_ordered', 0)
    ->get();
return view('frontend.cart-products', compact('shoppingProducts', 'productAddToCart'));
}



}
