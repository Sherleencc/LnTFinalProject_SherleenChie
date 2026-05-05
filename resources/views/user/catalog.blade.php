<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl">Katalog Barang</h2>
    </x-slot>

    @if (session('error'))
    <div class="mb-4 rounded bg-red-100 border border-red-400 text-red-700 px-4 py-3">
        {{ session('error') }}
    </div>
    @endif

    <div class="p-6 grid grid-cols-3 gap-4">
        @foreach ($products as $product)
        <div class="border p-4">
            @if($product->photo)
            <img src="{{ asset('storage/' . $product->photo) }}" class="w-full h-40 object-cover">
            @endif

            <h3 class="font-bold mt-2">{{ $product->name }}</h3>
            <p>{{ $product->category->name }}</p>
            <p>Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
            <p>Stock: {{ $product->stock }}</p>
            <a href="{{ route('invoice.create', $product->id) }}"
                class="bg-green-600 text-black px-4 py-2 mt-2 inline-block rounded hover:bg-green-700">
                Beli
            </a>
        </div>
        @endforeach
    </div>
</x-app-layout>