<x-app-layout>
    <section class="px-4 py-8 bg-gray-100">
        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Forgot Your Password?</h2>

            <p class="text-gray-600 text-center mb-6">
                No problem. Just enter your email, and we’ll send you a password reset link.
            </p>

            <!-- Session Status -->
            @if(session('status'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input id="email" type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500" value="{{ old('email') }}" required autofocus>
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full px-6 py-3 bg-orange-600 text-white font-semibold text-lg rounded-lg shadow-md hover:bg-orange-700 transition">
                    Send Password Reset Link
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
