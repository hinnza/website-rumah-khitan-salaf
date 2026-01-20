<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Khitan Salaf - Layanan Khitan & Luka Modern</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hover-card:hover { transform: translateY(-5px); } /* Efek kartu naik saat ditunjuk mouse */
    </style>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <header class="bg-white/90 backdrop-blur-md shadow-sm sticky top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            
            <a href="#" class="flex items-center gap-3 group">
                <img src="{{ asset('img/logo.png') }}" 
                    alt="Logo Rumah Khitan Salaf" 
                    class="w-12 h-12 rounded-full object-cover border-2 border-emerald-100 group-hover:border-emerald-500 group-hover:scale-105 transition duration-300 shadow-sm">
                
                <div class="flex flex-col leading-tight">
                    <span class="text-lg font-bold text-gray-800 tracking-tight group-hover:text-emerald-700 transition">Rumah Khitan <span class="text-emerald-600">Salaf</span></span>
                    <span class="text-[10px] text-gray-500 font-medium tracking-wider">KALIWUNGU, KENDAL</span>
                </div>
            </a>
            
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#tentang" class="text-sm font-medium text-gray-600 hover:text-emerald-600 transition">Tentang</a>
                <a href="#layanan" class="text-sm font-medium text-gray-600 hover:text-emerald-600 transition">Layanan</a>
                <a href="#galeri" class="text-sm font-medium text-gray-600 hover:text-emerald-600 transition">Galeri</a>
                <a href="#kontak" class="text-sm font-medium text-gray-600 hover:text-emerald-600 transition">Kontak</a>

                @if (Route::has('login'))
                    @auth
                        <div class="relative group">
                            <button class="flex items-center gap-2 text-emerald-700 font-bold bg-emerald-50 px-4 py-2 rounded-full hover:bg-emerald-100 transition border border-emerald-100">
                                <i class="fas fa-user-circle text-lg"></i>
                                <span>{{ Str::limit(Auth::user()->name, 10) }}</span>
                            </button>
                            
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 border border-gray-100 transform origin-top-right">
                                @if(Auth::user()->role === 'admin')
                                    <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-semibold border-b border-gray-100">
                                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                                    </a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 flex items-center">
                                        <i class="fas fa-sign-out-alt mr-2 text-gray-400"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center gap-2">
                            <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-emerald-600 px-4 py-2 hover:bg-gray-50 rounded-lg transition">Masuk</a>
                            <a href="{{ route('register') }}" class="bg-emerald-600 text-white text-sm font-bold px-6 py-2.5 rounded-full hover:bg-emerald-700 shadow-lg hover:shadow-emerald-500/30 transition transform hover:-translate-y-0.5">Daftar</a>
                        </div>
                    @endauth
                @endif
            </nav>

            <button id="mobile-menu-button" class="md:hidden text-gray-600 focus:outline-none p-2 rounded-md hover:bg-gray-100">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-inner">
            <div class="px-4 py-4 space-y-2">
                <a href="#tentang" class="block px-4 py-3 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 rounded-xl font-medium transition">Tentang</a>
                <a href="#layanan" class="block px-4 py-3 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 rounded-xl font-medium transition">Layanan</a>
                <a href="#galeri" class="block px-4 py-3 text-gray-600 hover:bg-emerald-50 hover:text-emerald-600 rounded-xl font-medium transition">Galeri</a>
                
                @auth
                    <div class="border-t border-gray-100 my-2 pt-2"></div>
                    <div class="px-4 text-xs text-gray-400 uppercase font-bold mb-2">Akun: {{ Auth::user()->name }}</div>
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-red-600 font-bold bg-red-50 rounded-lg mb-2 text-center">
                            <i class="fas fa-tachometer-alt mr-1"></i> Dashboard Admin
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="block w-full text-center px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg border border-gray-200 font-medium">Logout</button>
                    </form>
                @else
                    <div class="grid grid-cols-2 gap-3 mt-4 pt-2 border-t border-gray-100">
                        <a href="{{ route('login') }}" class="text-center py-2.5 border border-gray-200 rounded-xl font-bold text-gray-600 hover:bg-gray-50 transition">Masuk</a>
                        <a href="{{ route('register') }}" class="text-center py-2.5 bg-emerald-600 text-white rounded-xl font-bold hover:bg-emerald-700 shadow-lg shadow-emerald-200 transition">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-grow">
        
        <section class="relative bg-emerald-50 py-10">
            <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-10">
                <div class="md:w-1/2 text-center md:text-left z-10">
                    <span class="inline-block py-1 px-3 rounded-full bg-emerald-100 text-emerald-600 text-sm font-bold mb-4">
                        ✨ Pusat Khitan & Rawat Luka Modern
                    </span>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                        Solusi Khitan Nyaman <br> <span class="text-emerald-600">Buah Hati Tenang</span>
                    </h1>
                    <p class="text-gray-600 text-lg mb-8">
                        Melayani Khitan Modern, Rawat Luka, Cek Laborat, Bedah Minor, dan Homecare dengan tenaga medis profesional di Kaliwungu, Kendal.
                    </p>
                    <div class="flex gap-4 justify-center md:justify-start">
                        <a href="#kontak" class="bg-emerald-600 text-white font-bold py-3 px-8 rounded-full hover:bg-emerald-700 hover:shadow-lg transition">
                            Konsultasi WA
                        </a>
                        <a href="#layanan" class="bg-white text-emerald-600 border border-emerald-200 font-bold py-3 px-8 rounded-full hover:bg-emerald-50 transition">
                            Lihat Layanan
                        </a>
                    </div>
                </div>
                
                <div class="md:w-1/2 flex justify-center">
                    <img src="{{ asset('img/banner.jpg') }}" alt="Banner Rumah Khitan Salaf" class="w-full max-w-md drop-shadow-2xl hover:scale-105 transition duration-500">
                </div>
            </div>
        </section>

        <section id="layanan" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-800">Daftar Layanan & Harga</h2>
                    <p class="text-gray-500 mt-2">Transparan, terjangkau, dan profesional.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover-card">
                        <div class="w-14 h-14 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600 text-2xl mb-6">
                            <i class="fas fa-scissors"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Khitan Modern</h3>
                        <p class="text-gray-600 text-sm mb-4">Metode Konvensional, Laser, Super Siler/Lem. Aman dan minim pendarahan.</p>
                        <p class="text-emerald-600 font-bold bg-emerald-50 inline-block px-3 py-1 rounded-lg">Mulai Rp 600.000</p>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover-card">
                        <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 text-2xl mb-6">
                            <i class="fas fa-bandage"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Perawatan Luka</h3>
                        <p class="text-gray-600 text-sm mb-4">Penanganan luka diabetes, pasca operasi, kecelakaan, dll.</p>
                        <ul class="text-sm text-gray-500 space-y-1">
                            <li class="flex justify-between"><span>Klinik</span> <span class="font-bold">Rp 50.000</span></li>
                            <li class="flex justify-between"><span>Homecare</span> <span class="font-bold">Rp 100.000</span></li>
                        </ul>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover-card">
                        <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600 text-2xl mb-6">
                            <i class="fas fa-house-medical"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Homecare</h3>
                        <p class="text-gray-600 text-sm mb-4">Layanan kunjungan ke rumah untuk kenyamanan pasien.</p>
                        <p class="text-orange-600 font-bold bg-orange-50 inline-block px-3 py-1 rounded-lg">Mulai Rp 100.000</p>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover-card">
                        <div class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600 text-2xl mb-6">
                            <i class="fas fa-vial"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Cek Laborat Sederhana</h3>
                        <ul class="text-sm text-gray-600 space-y-2 mb-4">
                            <li class="flex justify-between"><span>Gula Darah</span> <span class="font-bold">Rp 20.000</span></li>
                            <li class="flex justify-between"><span>Asam Urat</span> <span class="font-bold">Rp 20.000</span></li>
                            <li class="flex justify-between"><span>Kolesterol</span> <span class="font-bold">Rp 25.000</span></li>
                        </ul>
                        <p class="text-purple-600 font-bold bg-purple-50 inline-block px-3 py-1 rounded-lg text-sm">Paket Lengkap: Rp 50.000</p>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover-card">
                        <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center text-red-600 text-2xl mb-6">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Bedah Minor</h3>
                        <p class="text-gray-600 text-sm mb-4">Pengangkatan mata ikan, uci-uci, perawatan kuku, dll.</p>
                        <p class="text-red-600 font-bold bg-red-50 inline-block px-3 py-1 rounded-lg">Mulai Rp 200.000</p>
                    </div>

                </div>
            </div>
        </section>

        <section id="galeri" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Dokumentasi Kegiatan</h2>
                    <p class="text-gray-600">Momen kebersamaan dan senyum bahagia pasien kami.</p>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4">
                    @for ($i = 1; $i <= 12; $i++)
                        <div class="overflow-hidden rounded-xl shadow-md group">
                            <img src="{{ asset('img/foto'.$i.'.jpg') }}" 
                                 alt="Dokumentasi {{ $i }}" 
                                 class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500 ease-in-out">
                        </div>
                    @endfor
                </div>
            </div>
        </section>

        <section id="testimoni" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-800">Kata Mereka</h2>
                    <p class="text-gray-500 mt-2">Ulasan asli dari pengunjung website.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse($suggestions as $item)
                        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 relative">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold mr-3">
                                    {{ substr($item->name, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm">{{ $item->name }}</h4>
                                    <span class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm italic">"{{ $item->message }}"</p>
                            
                            @if($item->admin_reply)
                                <div class="mt-4 pt-4 border-t border-gray-200">
                                    <div class="bg-white p-3 rounded-lg shadow-sm text-xs text-gray-600">
                                        <span class="font-bold text-emerald-600 block mb-1">Admin:</span>
                                        {{ $item->admin_reply }}
                                    </div>
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="col-span-3 text-center text-gray-500">Belum ada saran ditampilkan.</div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="kontak" class="py-20 bg-emerald-900 text-white">
            <div class="container mx-auto px-6">
                <div class="flex flex-col lg:flex-row gap-12">
                    
                    <div class="lg:w-1/2">
                        <h2 class="text-3xl font-bold mb-6">Hubungi Kami</h2>
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <i class="fas fa-map-marker-alt text-2xl text-emerald-400 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-lg">Alamat</h4>
                                    <p class="text-emerald-100 leading-relaxed">
                                        Kp. Penjalin, RT 03/RW 06, Protomulyo,<br>
                                        Kec. Kaliwungu Selatan, Kab. Kendal,<br>
                                        Jawa Tengah, 51372
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <i class="fas fa-phone text-2xl text-emerald-400 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-lg">Telepon / WA</h4>
                                    <p class="text-emerald-100">0857-4095-2777</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <i class="fab fa-youtube text-2xl text-emerald-400 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-lg">Youtube</h4>
                                    <a href="http://www.youtube.com/@rumahkhitansalaf5917" target="_blank" class="text-emerald-100 hover:text-white underline">Rumah Khitan Salaf</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <i class="fas fa-clock text-2xl text-emerald-400 mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-lg">Jam Buka</h4>
                                    <p class="text-emerald-100">Senin - Minggu: 16:00 - 21:00 WIB</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 rounded-xl overflow-hidden h-64 shadow-lg border-2 border-emerald-700">
                             <iframe 
                                src="https://maps.google.com/maps?q=RUMAH+KHITAN+SALAF&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>

                    <div class="lg:w-1/2 bg-white text-gray-800 p-8 rounded-2xl shadow-2xl">
                        <h3 class="text-2xl font-bold mb-2">Kirim Pesan / Saran</h3>
                        <p class="text-gray-500 mb-6 text-sm">Masukan Anda membantu kami berkembang lebih baik.</p>

                        @if(session('success'))
                            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm font-bold">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('saran.store') }}" method="POST">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-bold mb-1">Nama</label>
                                    <input type="text" name="name" 
                                        value="{{ Auth::user()->name ?? '' }}" 
                                        class="w-full border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring-2 focus:ring-emerald-500 focus:outline-none" 
                                        {{ Auth::check() ? 'readonly' : '' }} placeholder="Nama Anda">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold mb-1">Nomor WA</label>
                                    <input type="number" name="phone" class="w-full border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring-2 focus:ring-emerald-500 focus:outline-none" required placeholder="08xxxx">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold mb-1">Pesan</label>
                                    <textarea name="message" rows="3" class="w-full border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring-2 focus:ring-emerald-500 focus:outline-none" required placeholder="Tulis saran Anda..."></textarea>
                                </div>

                                @auth
                                    <button type="submit" class="w-full bg-emerald-600 text-white font-bold py-3 rounded-lg hover:bg-emerald-700 transition">Kirim Pesan</button>
                                @else
                                    <a href="{{ route('login') }}" class="block w-full text-center bg-gray-800 text-white font-bold py-3 rounded-lg hover:bg-gray-900">Login untuk Mengirim</a>
                                @endauth
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-gray-900 border-t border-gray-800 text-center py-6 text-gray-500 text-sm">
        <p>&copy; {{ date('Y') }} Rumah Khitan Salaf. All rights reserved.</p>
    </footer>

    <a href="https://wa.me/6285740952777" target="_blank" class="fixed bottom-6 right-6 z-50 bg-green-500 text-white w-14 h-14 rounded-full shadow-2xl flex items-center justify-center text-3xl hover:bg-green-600 hover:scale-110 transition duration-300 animate-bounce">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>