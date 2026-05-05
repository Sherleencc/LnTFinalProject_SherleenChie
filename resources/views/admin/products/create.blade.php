<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Tambah Barang</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label>Kategori</label>
                <input type="text" name="category_name" class="block border p-2 w-full">
            </div>

            <div class="mt-4">
                <label>Nama Barang</label>
                <input type="text" name="name" class="block border p-2 w-full">
            </div>

            <div class="mt-4">
                <label>Harga Barang</label>
                <input type="number" name="price" class="block border p-2 w-full">
            </div>

            <div class="mt-4">
                <label>Jumlah Barang</label>
                <input type="number" name="stock" class="block border p-2 w-full">
            </div>

            <div class="mt-4">
                <label>Foto Barang</label>
                <input type="file" name="photo" class="block border p-2 w-full">
            </div>

            <button class="mt-4 bg-blue-600 text-white px-4 py-2">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>