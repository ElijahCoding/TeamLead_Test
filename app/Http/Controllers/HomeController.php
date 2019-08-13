<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $topProducts = Product::getTopProducts();
        
        return view('home', compact('topProducts'));
    }
}
