<x-app-layout>
    <section class="px-4 py-8 bg-gray-100">
        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Selamat Datang</h2>

            <!-- Session Status -->
            @if(session('status'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input id="email" type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <input id="password" type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" required autocomplete="current-password">
                    @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-orange-600 hover:underline">
                            Lupa password anda?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-full px-6 py-3 bg-orange-600 text-white font-semibold text-lg rounded-lg shadow-md hover:bg-orange-700 transition">
                    Log in
                </button>
            </form>

            <!-- Register Link -->
            <p class="mt-6 text-center text-gray-600">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-orange-600 font-semibold hover:underline">Buat akun di sini</a>
            </p>
        </div>
    </section>
</x-app-layout>
