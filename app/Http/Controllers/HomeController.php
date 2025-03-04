<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured products for homepage
        $featuredProducts = Product::where('stock', '>', 0)
                                 ->orderBy('created_at', 'desc')
                                 ->take(6)
                                 ->get();
        
        return view('home', compact('featuredProducts'));
    }
}