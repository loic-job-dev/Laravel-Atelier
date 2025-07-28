<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        /* $products = DB::select(query: 'SELECT * FROM products'); */
        $products = Product::all();
        return view('product.catalog', compact('products'));
    }
    
    public function show(int $id): View {
        $products = Product::find($id); 

        return view('product.product-details', ['products' => $products]);
        
    } 
   

    public function SortByTittle()
    {
        
        $products = Product::orderBy('title', 'asc')->get();
        return view('product.catalog', compact('products'));
    }
    public function SortByPrice()
    {
        
        $products = Product::orderBy('price', 'asc')->get();
        return view('product.catalog', compact('products'));
    }

}