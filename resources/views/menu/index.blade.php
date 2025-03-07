<x-app-layout>	
	<section class="px-2 py-2 bg-white md:px-0">
      <div class="text-center">
        <h3 class="text-2xl font-bold">Menu Kami</h3>
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500">
          TODAY'S SPECIALITY</h2>
      </div>
      <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
		  @foreach ($products as $product)
			<div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
				<img class="w-full h-48 object-cover" src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" />
				
				<div class="px-6 py-4">
					<h4 class="mb-3 text-xl font-semibold tracking-tight text-orange-600 uppercase">
						{{ $product->name }}
					</h4>
					<p class="leading-normal text-gray-700">
						{{ $product->description }}
					</p>
				</div>

				<div class="flex items-center justify-between p-4">
					<!-- Updated Form with JS -->
					<form class="order-form" action="{{ route('cart.add') }}" method="POST">
						@csrf
						<input type="hidden" name="product_id" value="{{ $product->id }}">
						<input type="hidden" name="base_price" value="{{ $product->price }}"> <!-- Store base price -->

						<!-- Quantity Selection -->
						<div class="flex items-center space-x-2">
							<button type="button" class="px-2 py-1 bg-gray-300 text-gray-800 rounded" onclick="updateQuantity(this, -1, {{ $product->price }})">-</button>
							<input type="number" name="quantity" value="1" min="1" class="w-12 text-center border border-gray-300 rounded" 
								oninput="updatePrice(this, {{ $product->price }})">
							<button type="button" class="px-2 py-1 bg-gray-300 text-gray-800 rounded" onclick="updateQuantity(this, 1, {{ $product->price }})">+</button>
						</div>

						<!-- Submit Button with Notification -->
						<button type="submit" class="px-4 py-2 bg-orange-600 text-white mt-2 w-full submit-order">Beli</button>
					</form>

					<!-- Dynamic Price -->
					<span class="text-xl text-orange-600 price-display">Rp.{{ number_format($product->price, 2) }}</span>
				</div>
			</div>
		@endforeach
        </div>
      </div>
    </section>
</x-app-layout>

<script>
	document.addEventListener("DOMContentLoaded", function() {
        // Select all forms with class "order-form"
        document.querySelectorAll(".order-form").forEach(form => {
            form.addEventListener("submit", function(event) {
                event.preventDefault(); // Prevent the form from submitting immediately

                let formData = new FormData(this);
                let productName = this.closest('.rounded-lg').querySelector("h4").textContent;
                let quantity = formData.get("quantity");

                // Show SweetAlert confirmation
                Swal.fire({
                    title: "Order Placed!",
                    text: `${quantity}x ${productName} has been added to your cart.`,
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit(); // Now submit the form after user clicks "OK"
                    }
                });
            });
        });
    });

    function updateQuantity(button, change, basePrice) {
        let input = button.closest('div').querySelector('input[name="quantity"]');
        let priceDisplay = button.closest('.flex.items-center.justify-between').querySelector('.price-display');

        let quantity = parseInt(input.value) + change;
        if (quantity < 1) quantity = 1; // Prevent negative or zero quantity

        input.value = quantity;
        priceDisplay.textContent = `Rp.${(basePrice * quantity).toLocaleString('id-ID', { minimumFractionDigits: 2 })}`;
    }

    function updatePrice(input, basePrice) {
        let priceDisplay = input.closest('.flex.items-center.justify-between').querySelector('.price-display');

        let quantity = parseInt(input.value);
        if (isNaN(quantity) || quantity < 1) quantity = 1; // Prevent invalid values

        priceDisplay.textContent = `Rp.${(basePrice * quantity).toLocaleString('id-ID', { minimumFractionDigits: 2 })}`;
    }
</script>
