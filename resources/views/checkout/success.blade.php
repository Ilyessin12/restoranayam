<x-app-layout>
    <section class="px-4 py-8 bg-gray-100">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Order Summary -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Konfirmasi Pesanan</h2>
                <p class="text-gray-600 mt-2">Terima Kasih Atas Pesanan Anda! 🎉</p>
            </div>

            <div class="bg-orange-100 p-4 rounded-md shadow-sm border-l-4 border-orange-500 mb-6">
                <p class="text-lg font-semibold text-orange-700">ID Pesanan: <span class="text-gray-900">#{{ $order->id }}</span></p>
                <p class="text-lg font-semibold text-orange-700">Status: <span class="text-gray-900">{{ ucfirst($order->status) }}</span></p>
            </div>

            <!-- Order Details -->
            <h4 class="text-lg font-semibold text-gray-800 border-b pb-2 mb-4">Detail Pesanan:</h4>
            <ul class="divide-y divide-gray-200 mb-6">
                @foreach($order->orderDetails as $item)
                    <li class="py-3 flex justify-between">
                        <span class="text-gray-700">{{ $item->product->name }} ({{ $item->quantity }}x)</span>
                        <span class="font-semibold text-gray-900">Rp.{{ number_format($item->price * $item->quantity, 2) }}</span>
                    </li>
                @endforeach
            </ul>

            <!-- Total Amount -->
            <div class="p-4 bg-green-100 border-l-4 border-green-500 rounded mb-6 text-lg font-semibold text-green-700">
                Total: Rp.{{ number_format($order->total, 2) }}
            </div>

            <!-- Back to Home Button -->
            <div class="text-center">
                <a href="{{ route('beranda') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold text-lg rounded-lg shadow-md hover:bg-blue-700 transition">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
