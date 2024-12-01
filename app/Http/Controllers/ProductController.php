<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $products = Product::all(); // Mengambil semua produk
        return view('products.index', compact('products')); // Mengirim data produk ke view
    }

    // Menampilkan detail produk
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail(); // Menemukan produk berdasarkan slug
        return view('products.show', compact('product')); // Mengirim data produk ke view detail
    }
}
