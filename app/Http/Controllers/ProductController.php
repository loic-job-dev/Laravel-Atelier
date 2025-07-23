<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function indeex()
    {
        return view('/product/catalog');
    }
    
    public function show(int $id): View {
        return view('/product/product-details', ['id' => $id]);
    }
     public function index() {
        $products = DB::tables('products');
        return view('/product/product-details' , ['products' => $products]);
    }

}


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function showProduct(int $id): View {
        return view('product', ['id' => $id]);
    }

}