<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{

public function index(Request $request)
{
    $sort = $request->query('sortby'); // ex: ?sortby=price_large
    $query = Product::query();

    if (in_array($sort, ['name', 'price_large'])) {
        $query->orderBy($sort);
    }

    $products = $query->get();

    return view('/product/catalog', compact('products'));
}

    public function show(int $id): View
    {
        // $products = DB::select('select * from products where id = ' . $id);
        $products = Product::where('id', $id)->get();
        $category = Category::select('name')->where('id', $products[0]->category_id)->get();

        return view('/product/product-details', [
            'id' => $id,
            'price' => number_format($products[0]->price_large / 100, 2, ',', ' '),
            'product' => $products[0],
            'category' => $category[0],
        ]);
    }
}