<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $data =Color::all();
        return view('admin.colors.index', compact('data'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(Request $request )
    {

try{
    $data =$request->all();
    Color::create($data);
    return redirect()->route('color.index')->withSuccess('color Add Done !');
}catch(Exception $e){
    return redirect()->route('color.index')->withErrors($e->getMessage());
}


    }


    public function edit($id)
    {
        $data =Color::where('id',$id)->first();

        return view('admin.colors.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
    $data =($request->except('_token'));
    Color::where('id', $id)->update($data);
    return redirect()->route('color.index')->withSuccess('color Updated Successfully Done');
    }

    public function destroy($id)
    {
    $color =Color::find($id);
    $color->delete();
    return redirect()->route('color.index')->withSuccess('color Delete Done');
    }

    //tash list methode

    // public function trashlist()
    // {
    //     $data =Color::onlyTrashed()->get();
    //     return view('admin.colors.trashlist', compact('data'));
    // }

    // public function restorecolor($id)
    // {
    // Color::where('id', $id)->restore();
    // return redirect()->back()->withSuccess('color Restore Done');
    // }

    // public function forceDelete($id)
    // {
    // Color::where('id', $id)->forceDelete();
    // return redirect()->back()->withSuccess('color Restore Done');
    // }







    //excel route

//     public function export()
// {
//   return Excel::download(new CategoriesExport, 'categories.xlsx');
// }
}
