<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Kotak Saran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if(session('success'))
                        <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm">
                            <p class="font-bold">Berhasil!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full table-fixed border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-left text-xs font-bold text-gray-600 uppercase tracking-wider border-b-2 border-gray-200">
                                    <th class="p-4 w-1/4">Info Pengirim</th>
                                    
                                    <th class="p-4 w-3/5">Pesan & Balasan Admin</th>
                                    
                                    <th class="p-4 w-[15%] text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($suggestions as $item)
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out align-top">
                                    
                                    <td class="p-4">
                                        <div class="font-bold text-gray-800 text-base">{{ $item->name }}</div>
                                        <div class="text-sm text-gray-500 mb-2 font-mono bg-gray-100 inline-block px-2 py-0.5 rounded">
                                            {{ $item->phone }}
                                        </div>
                                        <div class="text-xs text-gray-400 mt-1 flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            {{ $item->created_at->format('d M Y, H:i') }}
                                        </div>
                                    </td>

                                    <td class="p-4">
                                        <form action="{{ route('dashboard.suggestions.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="bg-emerald-50 border-l-4 border-emerald-400 p-3 rounded-r mb-4 shadow-sm">
                                                <p class="text-gray-700 italic text-sm">"{{ $item->message }}"</p>
                                            </div>

                                            <div class="mb-3">
                                                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Balasan Admin</label>
                                                <textarea 
                                                    name="admin_reply" 
                                                    rows="2" 
                                                    class="w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" 
                                                    placeholder="Ketik balasan di sini..."
                                                >{{ $item->admin_reply }}</textarea>
                                            </div>

                                            <div class="flex items-center justify-between bg-gray-50 p-2 rounded border border-gray-200">
                                                
                                                <label class="flex items-center cursor-pointer select-none">
                                                    <div class="relative">
                                                        <input type="checkbox" name="is_visible" {{ $item->is_visible ? 'checked' : '' }} class="sr-only peer">
                                                        <div class="w-9 h-5 bg-gray-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-emerald-500"></div>
                                                    </div>
                                                    <span class="ml-2 text-xs font-bold text-gray-600">Tampilkan?</span>
                                                </label>

                                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold py-1.5 px-3 rounded flex items-center transition shadow-sm">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </td>

                                    <td class="p-4 text-center align-middle">
                                        <form action="{{ route('dashboard.suggestions.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" class="group flex flex-col items-center justify-center text-gray-400 hover:text-red-600 transition duration-300" title="Hapus Permanen">
                                                <div class="p-2 rounded-full group-hover:bg-red-50 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div>
                                                <span class="text-[10px] font-bold mt-1 opacity-0 group-hover:opacity-100 transition">Hapus</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="p-10 text-center text-gray-500 bg-gray-50 rounded-b-lg">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            <p>Belum ada saran yang masuk.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>