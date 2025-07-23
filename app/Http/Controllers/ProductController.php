<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function show(int $id): View {
        return view('/product/product-details', ['id' => $id]);
    }

}