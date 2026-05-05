<x-app-layout>
    <x-slot name="header">
        <h2>Struk Faktur</h2>
    </x-slot>

    <div class="p-6">

        <h3>No Invoice: {{ $invoice->invoice_number }}</h3>

        <p>Alamat: {{ $invoice->shipping_address }}</p>
        <p>Kode Pos: {{ $invoice->postal_code }}</p>

        <table class="mt-4 w-full border border-gray-400">
            <tr class="bg-gray-200">
                <th class="border p-2">Nama Barang</th>
                <th class="border p-2">Qty</th>
                <th class="border p-2">Subtotal</th>
            </tr>

            @foreach ($invoice->items as $item)
            <tr>
                <td class="border p-2">{{ $item->product->name }}</td>
                <td class="border p-2">{{ $item->quantity }}</td>
                <td class="border p-2">Rp. {{ number_format($item->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </table>

        <h3 class="mt-4 font-bold">
            Total: Rp. {{ number_format($invoice->total_price, 0, ',', '.') }}
        </h3>

        <button onclick="window.print()" class="mt-4 bg-blue-600 text-black px-4 py-2">
            Print
        </button>

    </div>
</x-app-layout>