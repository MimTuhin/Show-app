<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\ProductsExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use Intervention\Image\Facades\Image;
// use Image;
class ProductController extends Controller
{
    public function index()
    {

       $products = Product::all();
    // $products = DB::table('products')->get();
       return view('admin.product.index' ,compact('products'));
    }

public function create()
{
    $this->authorize('product_create');
    $categories = Category::all();
    $colors = Color::all();
    return view('admin.product.create', compact(
        'categories',
         'colors'
        ));
}

public function store(ProductRequest $request)
{
//    try{
// $request->validate([
//     'name' =>'required|unique:products'
// ]);

try{
    //image upload code
// dd($request->all());
    if($request->hasFile('image')) {

        $image =$this->uploadImage($request->image, $request->name);
    }

    // Product::create([
    //     'name' => $request->name,
    //     'image' =>$image
    // ]);

    // $products =$request->all();
   $products =Product::create([
        'name' => $request->name,
        'image' => $image,
        'category_id' => $request->category_id ?? ''
    ]);

    $products->colors()->attach($request->color_id);

    return redirect()->route('product.index')->withSuccess("Product Added Done");
}catch(Exception $e){
        return redirect()->route('product.index')->withErrors($e->getMessage());
       }

// }catch(Exception $e){
//     return redirect()->route('product.index')->withErrors($e->getMessage());
//    }
}


public function edit($id)
{
    $this->authorize('product_edit');
    $categories = Category::all();
    $colors = Color::all();
    $data =Product::where('id',$id)->first();
    $selectedColors = $data->colors->pluck('id')->toArray();

    return view('admin.product.edit', compact('data', 'categories', 'colors', 'selectedColors'));
}

public function update(Request $request, $id)
{
    // dd($request->all());
$data =$request->except('_token', 'color_id');

if($request->hasFile('image')) {
   $product =Product::where('id', $id)->first();
$this->unlink($product->image);
    $data['image'] =$this->uploadImage($request->image, $request->name);
}

 Product::where('id', $id)->update($data);
 $product =Product::find($id);
$product->colors()->sync($request->color_id);
return redirect()->route('product.index')->withSuccess('Product Updated Successfully Done');
}

public function destroy($id)
{
    $this->authorize('product_delete');
$product =Product::find($id);
$product->delete();
return redirect()->route('product.index')->withSuccess('Product Delete Done');
}


// trash methods

public function trashlist()
{
    $data =Product::onlyTrashed()->get();
    return view('admin.product.trashlist', compact('data'));
}

public function restoreProduct($id)
{
Product::where('id', $id)->restore();
return redirect()->back()->withSuccess('Product Restore Done');
}

public function forceDelete($id)
{

// $product = Product::where('id', $id)->onlyTrashed()->first();
// $product->colors()->detach();
Product::where('id', $id)->forceDelete();

return redirect()->back()->withSuccess('Product Restore Done');
}
//excel export

public function export()
{
  return Excel::download(new ProductsExport, 'products.xlsx');
}

private function uploadImage($file, $product_name)
{
    request()->validate([
        'image' => 'required',
    ]);
    // dd($file);
    $timestamp =str_replace(['',':'], '-', Carbon::now()->toDateTimeString());
    // dd($timestamp);
    $file_name =$timestamp .'-'.$product_name. '.' . $file->getClientOriginalExtension();
    // dd($file_name);

    $pathToUpload = storage_path().'/app/public/products';

    if(!is_dir($pathToUpload)) {
        mkdir($pathToUpload, 0755, true);
    }


    Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);
    return $file_name;

}

private function unlink($file)
{
    $pathToUpload = storage_path().'/app/public/products/';
    if($file != '' && file_exists($pathToUpload. $file)){
        @unlink($pathToUpload. $file);
    }
}

}
