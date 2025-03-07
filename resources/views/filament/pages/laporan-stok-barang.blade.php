<x-filament-panels::page class="dark bg-gray-900 text-white">
    <div class="p-6 bg-gray-800 text-white shadow rounded-lg">
        <!-- Export Buttons -->
        <div class="flex space-x-4 mt-4">
            <a href="{{ route('export.excel') }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow">
                Export dalam Excel
            </a>
            <a href="{{ route('export.csv') }}" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg shadow">
                Export dalam CSV
            </a>
			<a href="{{ route('export.pdf') }}" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg shadow">
				Export dalam PDF
			</a>
        </div>

        <div class="overflow-x-auto mt-4">
            <table class="w-full border rounded-lg shadow-md bg-gray-800 text-white">
                <thead class="bg-orange-500 text-white">
                    <tr>
                        <th class="p-3">Product ID</th>
                        <th class="p-3">Product Name</th>
                        <th class="p-3">Price</th>
                        <th class="p-3">Stock Quantity</th>
                        <th class="p-3">Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr class="border-b bg-gray-700 text-white">
                            <td class="p-3 text-center">{{ $product->id }}</td>
                            <td class="p-3 text-center">{{ $product->name }}</td>
                            <td class="p-3 text-center">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="p-3 text-center">
                                <span class="px-2 py-1 text-sm rounded-lg 
                                    {{ $product->stock > 10 ? 'bg-green-500' : ($product->stock > 0 ? 'bg-yellow-500' : 'bg-red-500') }}">
                                    {{ $product->stock ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="p-3 text-center">
                                {{ $product->updated_at ? $product->updated_at->format('Y-m-d H:i') : 'Never' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-filament-panels::page>
