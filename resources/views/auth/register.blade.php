<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-xl font-bold text-gray-800">Buat Akun Baru</h2>
        <p class="text-sm text-gray-500">Bergabunglah bersama kami</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700 mb-1" for="name">Nama Lengkap</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-user text-gray-400"></i>
                </div>
                <input id="name" class="block w-full pl-10 pr-3 py-2.5 border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-lg shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama Anda" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700 mb-1" for="email">Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                </div>
                <input id="email" class="block w-full pl-10 pr-3 py-2.5 border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nama@email.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700 mb-1" for="password">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                </div>
                <input id="password" class="block w-full pl-10 pr-3 py-2.5 border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-lg shadow-sm"
                                type="password"
                                name="password"
                                required autocomplete="new-password" placeholder="Minimal 8 karakter" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700 mb-1" for="password_confirmation">Konfirmasi Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-check-circle text-gray-400"></i>
                </div>
                <input id="password_confirmation" class="block w-full pl-10 pr-3 py-2.5 border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-lg shadow-sm"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-lg shadow-lg shadow-emerald-500/30 transition transform active:scale-95">
                {{ __('Daftar Sekarang') }}
            </button>
        </div>

        <div class="mt-6 text-center text-sm text-gray-600">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="font-bold text-emerald-600 hover:underline">Masuk disini</a>
        </div>
    </form>
</x-guest-layout>