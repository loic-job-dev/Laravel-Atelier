<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductController extends Controller
{

    public function index()

    {
        $products = DB::select('select * from products');

        return view('/product/catalog', ['products' => $products]);
    }

    public function show(int $id): View
    {
        $index = 1;
        foreach (Product::all() as $product) {


            echo($product->name);

            $index++;
        }


        $products = DB::select('select * from products where id = ' . $id);
        $category = DB::select('select name from categories where id =' . $products[0]->category_id);

        return view('/product/product-details', [
            'id' => $id,
            'price' => number_format($products[0]->price_large / 100, 2, ',', ' '),
            'product' => $products[0],
            'category' => $category[0],
        ]);
    }
}