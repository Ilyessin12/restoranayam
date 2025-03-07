<x-app-layout>
    <section class="px-4 py-8 bg-gray-100">
        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Edit Profile</h2>

            @if (session('status') === 'profile-updated')
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                    Profil anda berhasil diubah!
                </div>
            @endif

            <!-- Profile Update Form -->
            <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Name -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Alamat</label>
                    <input type="text" name="address" value="{{ old('address', $user->address) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    @error('address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                    @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full px-6 py-3 bg-orange-600 text-white font-semibold text-lg rounded-lg shadow-md hover:bg-orange-700 transition">
                    Simpan
                </button>
            </form>

            <!-- Password Update -->
            <div class="mt-10">
                <h2 class="text-lg font-semibold text-gray-800">Ganti Password</h2>
                <p class="text-gray-600 text-sm mb-4">Gunakan password panjang dan acak supaya lebih aman.</p>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <!-- Current Password -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Password Saat Ini</label>
                        <input type="password" name="current_password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        @error('current_password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- New Password -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Password Baru</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Ulangi Password Baru</label>
                        <input type="password" name="password_confirmation"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500">
                        @error('password_confirmation') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Update Password Button -->
                    <button type="submit" class="w-full px-6 py-3 bg-orange-600 text-white font-semibold text-lg rounded-lg shadow-md hover:bg-orange-700 transition">
                        Ubah Password
                    </button>
                </form>
            </div>

            <!-- Delete Account -->
            <div class="mt-10">
                <h2 class="text-lg font-semibold text-gray-800">Hapus Akun</h2>
                <p class="text-red-600 text-sm mb-4">Jika akun anda dihapus, anda tidak akan bisa mengembalikannya kembali.</p>

                <form method="POST" action="{{ route('profile.destroy') }}" class="space-y-4">
                    @csrf
                    @method('DELETE')

                    <label class="block text-gray-700 font-medium mb-2">Masukkan Password untuk Mengonfirmasi Penghapusan Akun</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                    @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror

                    <button type="submit" class="w-full px-6 py-3 bg-red-600 text-white font-semibold text-lg rounded-lg shadow-md hover:bg-red-700 transition">
                        Hapus Akun
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
