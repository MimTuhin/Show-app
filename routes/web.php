<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\colorpdfController;
use App\Http\Controllers\CategorypdfController;
use App\Http\Controllers\FrontConteoller;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShoppingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



// Route::get('/link', function(){
//     Artisan::call('storage:link');
// });

Route::get('/admin', function () {
    return view('admin.layouts.master');
})->middleware('auth');

Route::middleware('auth')->group(function(){
    Route::prefix('product')->group(function(){
        Route::get('/product', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/product-pdf', [PdfController::class, 'downloaddata'])->name('product.pdf');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

        // trash list route         //product route

        Route::get('/trashlist', [ProductController::class, 'trashlist'])->name('product.trashlist');
        Route::get('/restore/{id}', [ProductController::class, 'restoreProduct'])->name('product.restore');
        Route::delete('/delete/{id}', [ProductController::class, 'forceDelete'])->name('product.forcedelete');
        //excel export route
        Route::get('/product-export', [ProductController::class, 'export'])->name('product.excel');
    });


    Route::prefix('category')->group(function(){

        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

        Route::get('/category_create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category_store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/category-products/{id}', [CategoryController::class, 'categoryProducts'])->name('categories.products');
        //tras list route       //category route

        Route::get('/trashlist', [CategoryController::class, 'trashlist'])->name('category.trashlist');
        Route::get('/restore/{id}', [CategoryController::class, 'restoreCategory'])->name('category.restore');
        Route::delete('/delete/{id}', [CategoryController::class, 'forceDelete'])->name('category.forcedelete');

        Route::get('/category-pdf', [CategorypdfController::class, 'categorydownloaddata'])->name('category.pdf');
        Route::get('/category-export', [CategoryController::class, 'export'])->name('category.excel');
    });




    // Route::get('/', function() {
    //     $img = Product::make('foo.jpg')->resize(300, 200);
    //     return $img->response('jpg');
    // });







//profile route
Route::get('/profile', [ProfileController::class, 'getProfile'])->name('user.profile');
Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('user.profile_update');
Route::get('/users', [UserController::class, 'index'])->name('user.index');





Route::prefix('color')->group(function(){

    Route::get('/color', [ColorController::class, 'index'])->name('color.index');

    Route::get('/color_create', [ColorController::class, 'create'])->name('color.create');
    Route::post('/color_store', [ColorController::class, 'store'])->name('color.store');
    Route::get('/edit/{id}', [ColorController::class, 'edit'])->name('color.edit');
    Route::post('/update/{id}', [ColorController::class, 'update'])->name('color.update');
    Route::delete('/destroy/{id}', [ColorController::class, 'destroy'])->name('color.destroy');

    //tras list route       //color route


});


});


//frontend route start

Route::get('/front', [FrontConteoller::class, 'index'])->name('front.index');
Route::get('/category-product/{id}', [FrontConteoller::class, 'categoryWiseProduct'])->name('category-product');
Route::get('/product-details/{id}', [FrontConteoller::class, 'productDetails'])->name('product.detail');


//frontend route closed

//shoping cart route

Route::post('/shopping-cart', [ShoppingController::class, 'addShoppingCart'])->name('shopping.store');

Route::get('/shopping-products', [ShoppingController::class, 'getShoppingProducts'])->name('shopping.products');


Route::post('/order-store', [OrderController::class, 'store'])->name('order.store');

