<x-app-layout>
    <section class="px-4 py-8 bg-gray-100">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Checkout</h2>

            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf

                <!-- Address Field -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-medium mb-2">Address:</label>
                    <input type="text" name="address" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" required>
                </div>

                <!-- Phone Number Field -->
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number:</label>
                    <input type="text" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" required>
                </div>

                <!-- Total Amount -->
                <div class="p-4 bg-orange-100 border-l-4 border-orange-500 rounded mb-6">
                    <h4 class="text-lg font-semibold text-orange-700">Total: Rp.{{ number_format($total, 2) }}</h4>
                </div>

                <!-- Place Order Button -->
                <div class="text-center">
                    <button type="submit" class="w-full px-6 py-3 bg-green-600 text-white font-semibold text-lg rounded-lg shadow-md hover:bg-green-700 transition">
                        Place Order
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
