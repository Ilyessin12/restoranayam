<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Get all available products
        $products = Product::where('stock', '>', 0)->get();
        
        return view('menu.index', compact('products'));
    }
    
    public function show($id)
    {
        // Show details of specific product
        $product = Product::findOrFail($id);
        
        return view('menu.show', compact('product'));
    }
}