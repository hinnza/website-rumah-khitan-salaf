<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center">
            <i class="fas fa-tachometer-alt mr-2 text-emerald-600"></i> {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-gradient-to-r from-emerald-600 to-green-500 rounded-2xl shadow-lg p-8 mb-8 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-3xl font-bold mb-2">Selamat Datang, Admin!</h3>
                    <p class="opacity-90">Ini adalah pusat kontrol aplikasi Rumah Khitan Salaf. Anda bisa mengelola saran dan melihat aktivitas terbaru.</p>
                </div>
                <div class="absolute right-0 top-0 opacity-10 transform translate-x-10 -translate-y-10">
                    <i class="fas fa-hospital-user text-9xl"></i>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center">
                    <div class="w-14 h-14 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-2xl mr-4">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Total Saran Masuk</div>
                        <div class="text-2xl font-bold text-gray-800">{{ $totalSaran ?? 0 }}</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center">
                    <div class="w-14 h-14 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-2xl mr-4">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Ditampilkan di Web</div>
                        <div class="text-2xl font-bold text-gray-800">{{ $saranTampil ?? 0 }}</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center">
                    <div class="w-14 h-14 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-2xl mr-4">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm font-medium">Saran Minggu Ini</div>
                        <div class="text-2xl font-bold text-gray-800">{{ $saranBaru ?? 0 }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h4 class="font-bold text-gray-800 mb-4 border-b pb-2">Aksi Cepat</h4>
                    <div class="flex gap-4">
                        <a href="{{ route('dashboard.suggestions.index') }}" class="flex items-center gap-2 bg-emerald-600 text-white px-5 py-3 rounded-lg hover:bg-emerald-700 transition font-bold">
                            <i class="fas fa-envelope-open-text"></i> Kelola Kotak Saran
                        </a>
                        <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 bg-gray-100 text-gray-700 px-5 py-3 rounded-lg hover:bg-gray-200 transition font-bold">
                            <i class="fas fa-external-link-alt"></i> Lihat Website Utama
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>