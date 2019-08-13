<?php

namespace App\Http\Controllers;

use App\Models\{Product, Category};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'products' => Product::getTopProducts(),
            'categories' => Category::get(),
            'query' => ''
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get("search");
        if ($query) {
            $products = Product::where('title', 'like', "%{$query}%")
                                ->orWhere('description', 'like', "%{$query}%")
                                ->get();

            return view('home', compact("products", "query"));
        } else {
            return redirect()->route('home');
        }
    }
}
