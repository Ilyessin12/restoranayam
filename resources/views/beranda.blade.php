<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div
      class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
      style="background-image: url('{{ asset('images/bg.jpg') }}');">
      <h1
        class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500 md:text-center sm:leading-none lg:text-5xl">
        <span class="inline md:block">Selamat Datang di Restoranayam</span>
      </h1>
      <div class="mx-auto mt-2 text-orange-50 md:text-center lg:text-lg">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta voluptatem ab necessitatibus illo praesentium
        culpa excepturi quae commodi quaerat,
      </div>
      <div class="flex flex-col items-center mt-12 text-center">
        <span class="relative inline-flex w-full md:w-auto">
          <a href="#_" type="button"
            class="inline-flex items-center justify-center px-6 py-2 text-base font-bold leading-6 text-white bg-orange-600 rounded-full lg:w-full md:w-auto hover:bg-orange-500 focus:outline-none">
            Pesan Sekarang
          </a>
      </div>
    </div>
	
	<section class="px-2 py-32 bg-white md:px-0">
      <div class="mt-4 text-center">
        <h3 class="text-2xl font-bold">Menu Kami</h3>
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500">
          TODAY'S SPECIALITY</h2>
      </div>
      <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
		@foreach ($products->take(8) as $product) <!-- Limit to 8 products -->
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
					<!-- Redirect Button -->
					<a href="{{ route('menu') }}" class="px-6 py-2 bg-orange-600 text-white text-center rounded-lg shadow-md hover:bg-orange-700 transition w-auto mx-auto ml-4">
						Beli
					</a>

					<!-- Static Price -->
					<span class="text-xl text-orange-600">Rp.{{ number_format($product->price, 2) }}</span>
				</div>
			</div>
		@endforeach
        </div>
      </div>
    </section>
</x-app-layout>
