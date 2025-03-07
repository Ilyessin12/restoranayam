<x-filament::page class="dark bg-gray-900 text-white">
    <div class="p-6 bg-gray-800 text-white shadow rounded-lg">
        <h1 class="text-2xl font-bold text-white">Admin Dashboard</h1>
        <p class="text-gray-400">Welcome back, {{ auth()->user()->name }}!</p>

        <!-- Recent Orders -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold text-white">Recent Orders</h2>
            @if ($orders->isEmpty())
                <p class="text-gray-400">No recent orders found.</p>
            @else
                <div class="overflow-x-auto mt-4">
                    <table class="w-full border rounded-lg shadow-md bg-gray-800 text-white">
                        <thead class="bg-orange-500 text-white">
                            <tr>
                                <th class="p-3">Order ID</th>
                                <th class="p-3">User</th>
                                <th class="p-3">Total</th>
                                <th class="p-3">Status</th>
                                <th class="p-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr class="border-b bg-gray-700 text-white">
                                    <td class="p-3 text-center">#{{ $order->id }}</td>
                                    <td class="p-3 text-center">{{ $order->user->name ?? 'Guest' }}</td>
                                    <td class="p-3 text-center">Rp.{{ number_format($order->total, 2) }}</td>
                                    <td class="p-3 text-center">
                                        <span class="px-2 py-1 text-sm rounded-lg {{ $order->status == 'completed' ? 'bg-green-500 text-white' : 'bg-yellow-500 text-white' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="p-3 text-center">
                                        <a href="{{ route('orders.show', $order->id) }}" class="text-blue-400 hover:underline">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-filament::page>
