<x-app-layout>
    <x-slot name="header">
        <h2>Buat Faktur</h2>
    </x-slot>

    <div class="p-6">

        <h3 class="font-bold text-lg">{{ $product->name }}</h3>
        <p>Harga: Rp. {{ $product->price }}</p>

        <form action="{{ route('invoice.store', $product->id) }}" method="POST">
            @csrf

            @if (session('error'))
            <div class="mb-4 rounded bg-red-100 border border-red-400 text-red-700 px-4 py-3">
                {{ session('error') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="mb-4 rounded bg-red-100 border border-red-400 text-red-700 px-4 py-3">
                <strong>Input tidak valid:</strong>
                <ul class="list-disc ml-5 mt-2">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mt-4">
                <label>Jumlah</label>
                <input type="number" name="quantity" value="{{ old('quantity') }}" class="border p-2 w-full">
            </div>

            <div class="mt-4">
                <label>Alamat</label>
                <input type="text" name="address" value="{{ old('address') }}" class="border p-2 w-full">
            </div>

            <div class="mt-4">
                <label>Kode Pos</label>
                <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="border p-2 w-full">
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 mt-4">
                Buat Faktur
            </button>
        </form>

    </div>
</x-app-layout>