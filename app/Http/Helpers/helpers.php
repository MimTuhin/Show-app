<?php

use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Facades\DB;



function roleName($id)
{
    $roleData = DB::table('roles')->where('id',$id)->first();
    return $roleData->name ?? '';
}

function productName($id){
    $productName = Product::where('id', $id)->first()->name ?? '';
    return $productName;
}

function colorName($id){
    $colorName = Color::where('id', $id)->first()->title ?? '';
    return $colorName;
}



?>
