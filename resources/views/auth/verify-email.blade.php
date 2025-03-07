<x-app-layout>
    <section class="px-4 py-8 bg-gray-100">
        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Verify Your Email</h2>

            <p class="text-gray-600 text-center mb-6">
                Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just sent you. If you didn’t receive the email, we can send you another.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded text-center">
                    A new verification link has been sent to your email.
                </div>
            @endif

            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <form method="POST" action="{{ route('verification.send') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full px-6 py-3 bg-orange-600 text-white font-semibold text-lg rounded-lg shadow-md hover:bg-orange-700 transition">
                        Resend Verification Email
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-6 py-3 bg-gray-500 text-white font-semibold text-lg rounded-lg shadow-md hover:bg-gray-600 transition">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
