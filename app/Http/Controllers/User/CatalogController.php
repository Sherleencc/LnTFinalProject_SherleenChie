<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index()
{
    $products = Product::with('category')->get();
    return view('user.catalog', compact('products'));
}

}
