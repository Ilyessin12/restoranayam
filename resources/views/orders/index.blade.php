<x-app-layout>
    <section class="px-4 py-8 bg-gray-100">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Pesanan Saya</h2>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if($orders->isEmpty())
                <p class="text-center text-gray-600">Anda belum memiliki pesanan.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-orange-500 text-white">
                                <th class="p-4 text-left">ID Pesanan</th>
                                <th class="p-4 text-left">Tanggal</th>
                                <th class="p-4 text-left">Total</th>
                                <th class="p-4 text-left">Status</th>
                                <th class="p-4 text-center"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($orders as $order)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-4">#{{ $order->id }}</td>
                                    <td class="p-4">{{ $order->created_at->format('d M Y') }}</td>
                                    <td class="p-4 text-green-600 font-semibold">Rp.{{ number_format($order->total, 2) }}</td>
                                    <td class="p-4">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                            {{ $order->status == 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <a href="{{ route('checkout.success', $order->id) }}" 
                                            class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                                            Liat Pesanan
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
