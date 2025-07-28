<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductController extends Controller {


    public function formatPrice (float $price):string {
        return number_format($price / 100, 2, ',', ' ') . " €";
    }
    public function display(Request $request)
    {
        
        $sortby = $request->query('sortby', 'name');
        $dirby  = $request->query('dirby',  'asc');

       
        $products = Product::orderBy($sortby, $dirby)->get();

        return view('product.catalog', [
            'products' => $products,
        ]);
    }
    
    public function show(int $id): View {


        $products = DB::select('select * from products where id = ' . $id);
        $category = DB::select('select name from categories where id =' . $products[0]->category_id);

        return view('/product/product-details', ['id' => $id, 
                                                            'price' => number_format($products[0]->price_large / 100, 2, ',', ' '),
                                                            'product' => $products[0],
                                                            'category' => $category[0],
                                                            ]);
    }
}

