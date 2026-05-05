<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $products = Product::with('category')->get();
    return view('admin.products.index', compact('products'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('admin.products.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'category_name' => ['required', 'string'],
        'name' => ['required', 'string', 'min:5', 'max:80'],
        'price' => ['required', 'integer'],
        'stock' => ['required', 'integer'],
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png'],
    ]);

    $category = Category::firstOrCreate([
        'name' => $request->category_name,
    ]);

    $photoPath = null;

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('products', 'public');
    }

    Product::create([
        'category_id' => $category->id,
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'photo' => $photoPath,
    ]);

    return redirect()->route('products.index')->with('success', 'Barang berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
{
    return view('admin.products.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    $request->validate([
        'category_name' => ['required', 'string'],
        'name' => ['required', 'string', 'min:5', 'max:80'],
        'price' => ['required', 'integer'],
        'stock' => ['required', 'integer'],
        'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png'],
    ]);

    $category = Category::firstOrCreate([
        'name' => $request->category_name,
    ]);

    $data = [
        'category_id' => $category->id,
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
    ];

    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('products', 'public');
    }

    $product->update($data);

    return redirect()->route('products.index')->with('success', 'Barang berhasil diupdate.');
}

public function destroy(Product $product)
{
    $product->delete();
    return redirect()->route('products.index');
}
}
