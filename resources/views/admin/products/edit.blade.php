<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Barang
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Kategori</label>
                        <input type="text" name="category_name"
                            value="{{ old('category_name', $product->category->name) }}"
                            class="block w-full border border-gray-300 rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Nama Barang</label>
                        <input type="text" name="name"
                            value="{{ old('name', $product->name) }}"
                            class="block w-full border border-gray-300 rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Harga</label>
                        <input type="number" name="price"
                            value="{{ old('price', $product->price) }}"
                            class="block w-full border border-gray-300 rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Stock</label>
                        <input type="number" name="stock"
                            value="{{ old('stock', $product->stock) }}"
                            class="block w-full border border-gray-300 rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Foto Baru</label>
                        <input type="file" name="photo" class="block w-full border border-gray-300 rounded px-3 py-2">

                        @if ($product->photo)
                            <img src="{{ asset('storage/' . $product->photo) }}"
                                class="mt-3 w-32 h-24 object-cover rounded">
                        @endif
                    </div>

                    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>