<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Admin
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-bold mb-2">
                    Selamat datang, {{ auth()->user()->name }}!
                </h3>

                <p class="text-gray-600 mb-4">
                    Gunakan dashboard ini untuk mengelola data barang pada website.
                </p>

                <a href="{{ route('products.index') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 inline-block">
                    Kelola Barang
                </a>
            </div>
        </div>
    </div>
</x-app-layout>