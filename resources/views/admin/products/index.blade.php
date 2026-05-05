<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Barang
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <a href="{{ route('products.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 inline-block">
                    Tambah Barang
                </a>
            </div>

            <div class="bg-white shadow-sm rounded-lg p-6 overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="border p-3">Foto</th>
                            <th class="border p-3">Kategori</th>
                            <th class="border p-3">Nama</th>
                            <th class="border p-3">Harga</th>
                            <th class="border p-3">Stock</th>
                            <th class="border p-3">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($products as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="border p-3">
                                    @if ($product->photo)
                                        <img src="{{ asset('storage/' . $product->photo) }}"
                                            class="w-20 h-14 object-cover rounded">
                                    @else
                                        <span class="text-gray-400">Tidak ada foto</span>
                                    @endif
                                </td>

                                <td class="border p-3">{{ $product->category->name }}</td>
                                <td class="border p-3">{{ $product->name }}</td>
                                <td class="border p-3">Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="border p-3">{{ $product->stock }}</td>

                                <td class="border p-3">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="text-blue-600 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}"
                                        method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="text-red-600 hover:underline ml-2">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border p-4 text-center text-gray-500">
                                    Belum ada barang.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>