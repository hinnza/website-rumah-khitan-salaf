<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-emerald-50 to-gray-100">
            
            <div class="mb-6 text-center">
                <a href="/" class="flex flex-col items-center gap-3 group">
                    <img src="{{ asset('img/logo.png') }}" 
                         alt="Logo Rumah Khitan Salaf" 
                         class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg shadow-emerald-500/20 group-hover:scale-105 transition duration-300">
                    
                    <div class="flex flex-col items-center leading-none mt-2">
                        <span class="text-2xl font-bold text-gray-800 tracking-tight">Rumah Khitan <span class="text-emerald-600">Salaf</span></span>
                        <span class="text-xs text-gray-500 font-medium tracking-widest uppercase mt-1">KALIWUNGU, KENDAL</span>
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-8 py-8 bg-white shadow-2xl shadow-gray-200/50 overflow-hidden sm:rounded-2xl border border-gray-100 relative">
                <div class="absolute top-0 right-0 -mr-4 -mt-4 w-20 h-20 rounded-full bg-emerald-50 opacity-50 blur-xl"></div>
                
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-center text-xs text-gray-400">
                &copy; {{ date('Y') }} Rumah Khitan Salaf. All rights reserved.
            </div>
        </div>
    </body>
</html>