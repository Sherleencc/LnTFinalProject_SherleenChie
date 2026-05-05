<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function create($product)
    {
        $product = Product::findOrFail($product);

        if ($product->stock <= 0) {
            return redirect('/catalog')->with('error', 'Barang sudah habis, silakan tunggu hingga barang di-restock ulang.');
        }

        return view('user.invoice_create', compact('product'));
    }

    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->stock <= 0) {
            return back()->with('error', 'Barang sudah habis, silakan tunggu hingga barang di-restock ulang.');
        }

        $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . $product->stock],
            'address' => ['required', 'min:10', 'max:100'],
            'postal_code' => ['required', 'digits:5'],
        ]);

        $subtotal = $product->price * $request->quantity;

        $invoice = Invoice::create([
            'user_id' => Auth::id(),
            'invoice_number' => 'INV-' . time(),
            'shipping_address' => $request->address,
            'postal_code' => $request->postal_code,
            'total_price' => $subtotal,
        ]);

        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'subtotal' => $subtotal,
        ]);

        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('invoice.show', $invoice->id);
    }

    public function show($id)
    {
        $invoice = Invoice::with('items.product')->findOrFail($id);
        return view('user.invoice_show', compact('invoice'));
    }
}
