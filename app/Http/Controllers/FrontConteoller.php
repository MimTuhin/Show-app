<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shopping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontConteoller extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $productAddToCart = Shopping::where('user_id', Auth::user()->id)
        ->where('is_ordered', 0)
        ->get()->count();

        return view('frontend.index', compact('categories', 'productAddToCart'));
    }

public function categoryWiseProduct($id)
{
    $productAddToCart = Shopping::where('user_id', Auth::user()->id)
    ->where('is_ordered', 0)
    ->get()->count();

$category = Category::find($id);
// dd($category->products);
    $categories = Category::all();
    return view('frontend.category-product', compact('categories', 'category', 'productAddToCart'));
}

public function productDetails($id)
{
    // dd($id);
    $categories = Category::all();
    $productAddToCart = Shopping::where('user_id', Auth::user()->id)
    ->where('is_ordered', 0)
    ->get()->count();

$product =Product::find($id);

    return view('frontend.product-details', compact('categories', 'productAddToCart', 'product'));
}



}
