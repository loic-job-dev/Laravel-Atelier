<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomePage extends Controller
{
    public function index () {
        $products= DB::select('select * from products');
        return view ('homepage' , ['products' => $products]);
    }
}
    // 
