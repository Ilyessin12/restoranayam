<x-filament-panels::page class="dark bg-gray-900 text-white">
    <div class="p-6 bg-gray-800 text-white shadow rounded-lg">
		<!-- Export Buttons-->
		<div class="flex justify-end space-x-4 mb-4">
			<a href="{{ route('laporan-keuangan.export.excel') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
				Export dalam Excel
			</a>
			<a href="{{ route('laporan-keuangan.export.csv') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
				Export dalam CSV
			</a>
			<a href="{{ route('laporan-keuangan.export.pdf') }}" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
				Export dalam PDF
			</a>
		</div>
        <div class="overflow-x-auto mt-4">
            <table class="w-full border rounded-lg shadow-md bg-gray-800 text-white">
                <thead class="bg-orange-500 text-white">
                    <tr>
                        <th class="p-3">ID Pesanan</th>
                        <th class="p-3">User</th>
                        <th class="p-3">Tanggal Pemesanan</th>
                        <th class="p-3">Total</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-b bg-gray-700 text-white">
                            <td class="p-3 text-center">#{{ $order->id }}</td>
                            <td class="p-3 text-center">{{ $order->user->name ?? 'Guest' }}</td>
                            <td class="p-3 text-center">{{ $order->order_date->format('Y-m-d') }}</td>
                            <td class="p-3 text-center">Rp.{{ number_format($order->total, 2) }}</td>
                            <td class="p-3 text-center">
                                <span class="px-2 py-1 text-sm rounded-lg 
                                    {{ $order->status == 'completed' ? 'bg-green-500' : 'bg-yellow-500' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="p-3 text-center">
                                <button onclick="toggleDetails({{ $order->id }})"
                                    class="px-2 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                    View
                                </button>
                            </td>
                        </tr>
                        <!-- Order Details (Initially Hidden) -->
                        <tr id="details-{{ $order->id }}" class="hidden">
                            <td colspan="6" class="p-3 bg-gray-900 text-white">
                                <strong>Detail:</strong>
                                <ul class="mt-2">
                                    @foreach ($order->orderDetails as $detail)
                                        <li class="text-sm">
                                            {{ $detail->product->name }} - {{ $detail->quantity }}x Rp.{{ number_format($detail->price, 2) }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-filament-panels::page>

<script>
    function toggleDetails(orderId) {
        let row = document.getElementById(`details-${orderId}`);
        row.classList.toggle('hidden');
    }
</script>