<x-app-layout>
<section class="px-2 py-2 bg-white md:px-0">
<div class="container mt-5">
    <div class="text-center">
      <h2 class="text-2xl font-bold">Shopping Cart</h2>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
	<div class="relative flex flex-col w-full max-w-6xl mx-auto h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border p-6">
		@if($cartItems)
			<table class="w-full text-left table-auto min-w-max">
				<thead>
					<tr class="border-b border-slate-300 bg-orange-500 text-white">
						<th class="p-4 text-sm font-normal leading-none">Image</th>
						<th class="p-4 text-sm font-normal leading-none">Name</th>
						<th class="p-4 text-sm font-normal leading-none">Price</th>
						<th class="p-4 text-sm font-normal leading-none">Quantity</th>
						<th class="p-4 text-sm font-normal leading-none">Subtotal</th>
						<th class="p-4 text-sm font-normal leading-none"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($cartItems as $id => $item)
					<tr class="hover:bg-slate-50">
						<td class="p-4 border-b border-slate-200 py-5">
						  <img src="{{ asset('images/' . $item['image']) }}" width="100">
						</td>
						<td class="p-4 border-b border-slate-200 py-5">
						  {{ $item['name'] }}
						</td>
						<td class="p-4 border-b border-slate-200 py-5">
						  ${{ number_format($item['price'], 2) }}
						</td>
						<td class="p-4 border-b border-slate-200 py-5">
							<form action="{{ route('cart.update') }}" method="POST">
								@csrf
								<input type="hidden" name="id" value="{{ $id }}">
								<input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
								<button type="submit" class="btn btn-sm btn-primary">Update</button>
							</form>
						</td>
						<td class="p-4 border-b border-slate-200 py-5">
						  Rp.{{ number_format($item['price'] * $item['quantity'], 2) }}
						</td>
						<td class="p-4 border-b border-slate-200 py-5">
							<form action="{{ route('cart.remove') }}" method="POST">
								@csrf
								<input type="hidden" name="id" value="{{ $id }}">
								<button type="submit" class="btn btn-sm btn-danger">Remove</button>
							</form>
						</td>
					</tr>
					@endforeach
					<!-- Total Row -->
					<tr class="border-t-2 border-orange-500 font-bold">
						<td colspan="4" class="p-4 text-right text-lg">Total:</td>
						<td colspan="2" class="p-4 text-lg text-orange-600">Rp.{{ number_format($total, 2) }}</td>
					</tr>
				</tbody>
			</table>
			<div class="flex justify-end mt-4">
				<a href="{{ route('checkout.index') }}" class="px-6 py-3 bg-green-600 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-green-700 transition">
					Proceed to Checkout
				</a>
			</div>
		@else
			<p>Keranjang anda kosong.</p>
		@endif
	</div>
</div>
</section>
</x-app-layout>
