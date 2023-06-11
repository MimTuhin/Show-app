<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        if(request()->keyword){
           $data =Category::where('name', request()->keyword)->get();
        }else{
            $data =Category::all();
        }

        return view('admin.category.index', compact('data'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request )
    {

try{
    $data =$request->all();
    Category::create($data);
    return redirect()->route('category.index')->withSuccess('Category Add Done !');
}catch(Exception $e){
    return redirect()->route('category.index')->withErrors($e->getMessage());
}


    }


    public function edit($id)
    {
        $data =Category::where('id',$id)->first();

        return view('admin.category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
    $data =($request->except('_token'));
    Category::where('id', $id)->update($data);
    return redirect()->route('category.index')->withSuccess('category Updated Successfully Done');
    }

    public function destroy($id)
    {
    $category =Category::find($id);
    $category->delete();
    return redirect()->route('category.index')->withSuccess('category Delete Done');
    }

    //tash list methode

    public function trashlist()
    {
        $data =Category::onlyTrashed()->get();
        return view('admin.category.trashlist', compact('data'));
    }

    public function restoreCategory($id)
    {
    Category::where('id', $id)->restore();
    return redirect()->back()->withSuccess('category Restore Done');
    }

    public function forceDelete($id)
    {
    Category::where('id', $id)->forceDelete();
    return redirect()->back()->withSuccess('Category Restore Done');
    }







    //excel route

    public function export()
{
  return Excel::download(new CategoriesExport, 'categories.xlsx');
}

    //    dd($request->all());
// try{
// $data =$request->all();
//     Category::create([

//     'name'=>$request->name
// ]);
// return redirect()->route('category.index')->with('success', 'Category Add Done');
// }catch(Exception $e){
//     dd($e->getMessage());}


public function categoryProducts($categoryId)
{
    // dd($categoryId);
    $category = Category::find($categoryId);
    // dd($category->products);
    return view('admin.category.products', compact('category'));
}




}
