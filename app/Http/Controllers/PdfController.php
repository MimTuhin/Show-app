<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function downloaddata(){


$data =Product::all();

$fileName = 'product.pdf';

$html =view('admin.product.product_pdf', compact('data'))->render();
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output($fileName,'I');

    }
}
