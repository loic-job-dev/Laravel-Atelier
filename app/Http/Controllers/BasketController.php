<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function show()
    {
        return view('/basket/basket');
    }
}
