<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function showProduct(int $id): View {
        return view('product', ['id' => $id]);
    }

}