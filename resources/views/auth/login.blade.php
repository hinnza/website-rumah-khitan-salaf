<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <h2 class="text-xl font-bold text-gray-800">Selamat Datang Kembali</h2>
        <p class="text-sm text-gray-500">Silakan masuk ke akun Anda</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700 mb-1" for="email">Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-envelope text-gray-400"></i>
                </div>
                <input id="email" class="block w-full pl-10 pr-3 py-2.5 border-gray-300 focus:border-emerald-500 focus:ring-emerald-500 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@email.com" />
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
                                required autocomplete="current-password" 
                                placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4 flex justify-between items-center">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-emerald-600 shadow-sm focus:ring-emerald-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
            </label>
            
            @if (Route::has('password.request'))
                <a class="underline text-sm text-emerald-600 hover:text-emerald-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500" href="{{ route('password.request') }}">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>

        <div class="mt-6">
            <button class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-lg shadow-lg shadow-emerald-500/30 transition transform active:scale-95 flex justify-center items-center gap-2">
                {{ __('Masuk Sekarang') }} <i class="fas fa-arrow-right"></i>
            </button>
        </div>

        <div class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="font-bold text-emerald-600 hover:underline">Daftar disini</a>
        </div>
    </form>
</x-guest-layout>