<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorypdfController extends Controller
{
    public function categorydownloaddata(){


        $data = Category::all();

        $fileName = 'category.pdf';

        $html =view('admin.category.category_pdf', compact('data'))->render();
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName,'I');

            }
}
