<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $topProducts = Product::getTopProducts();

        return view('home', [
            'products' => $topProducts
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get("search");

        $products = Product::where('title', 'like', "%{$query}%")
                            ->orWhere('description', 'like', "%{$query}%")
                            ->get();

        return view('home', compact("products", "query"));
    }
}
