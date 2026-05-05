<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CatalogController;
use App\Http\Controllers\User\InvoiceController;

Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = request()->user();

    if (!$user) {
        return redirect('/login');
    }

    if ($user->role !== 'admin') {
        return redirect('/catalog');
    }

    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/invoice/create/{product}', [InvoiceController::class, 'create'])
        ->name('invoice.create');
});

Route::post('/invoice/store/{product}', [InvoiceController::class, 'store'])
    ->name('invoice.store');

Route::get('/invoice/create/{product}', [InvoiceController::class, 'create'])
    ->name('invoice.create');

Route::get('/invoice/{invoice}', [InvoiceController::class, 'show'])
    ->name('invoice.show');

require __DIR__ . '/auth.php';
