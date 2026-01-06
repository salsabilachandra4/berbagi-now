<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'BerbagiNow') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center min-h-screen flex-col">
        
        <header class="w-full lg:max-w-4xl text-sm mb-6 flex justify-end gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-5 py-1.5 border border-[#19140035] dark:text-[#EDEDEC] dark:border-[#3E3E3A] rounded-sm transition-colors hover:bg-gray-50">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-5 py-1.5 dark:text-[#EDEDEC]">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-1.5 border border-[#19140035] dark:text-[#EDEDEC] dark:border-[#3E3E3A] rounded-sm transition-colors hover:bg-gray-50">Register</a>
                    @endif
                @endauth
            @endif
        </header>

        <div class="flex items-center justify-center w-full lg:grow">
            <main class="w-full lg:max-w-5xl">
                
                <div class="mb-8 text-center md:text-left">
                    <h1 class="text-3xl font-bold mb-1">Donate Now</h1>
                    <p class="text-[#706f6c] dark:text-[#A1A09A]">Bantu sesama melalui program donasi di bawah ini.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @forelse($donations as $donation)
                        <div class="flex flex-col bg-white dark:bg-[#161615] shadow-sm rounded-xl overflow-hidden border border-[#e3e3e0] dark:border-[#3E3E3A]">
                            
                            <div class="w-full aspect-video bg-gray-100 relative overflow-hidden">
                                @if($donation->image)
                                    {{-- Mengambil gambar dari public/storage --}}
                                    <img src="{{ asset('storage/' . $donation->image) }}" 
                                         class="w-full h-full object-cover" 
                                         alt="{{ $donation->title }}"
                                         onerror="this.src='https://placehold.co/600x400?text=Gambar+Tidak+Ditemukan'">
                                @else
                                    <div class="flex items-center justify-center h-full text-gray-400 text-sm italic">
                                        No Image Uploaded
                                    </div>
                                @endif
                            </div>

                            <div class="p-6 flex flex-col justify-between flex-1">
                                <div class="mb-4">
                                    <h2 class="font-bold text-xl mb-2 dark:text-white">{{ $donation->title }}</h2>
                                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">
                                        {{ $donation->description ?? '-' }}
                                    </p>
                                </div>

                                <div class="space-y-3 border-t border-[#f0f0f0] dark:border-[#2a2a29] pt-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-xs text-gray-500 uppercase font-semibold">Terkumpul</span>
                                        {{-- Menggunakan null coalescing ?? 0 agar muncul angka 0 jika data kosong --}}
                                        <span class="text-lg font-bold text-green-600">
                                            Rp {{ number_format($donation->current_amount ?? 0, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <div class="bg-gray-50 dark:bg-[#1c1c1b] p-3 rounded-lg text-[11px] text-[#555] dark:text-gray-400">
                                        <p class="mb-1 font-mono tracking-tight">{{ $donation->bank_info }}</p>
                                        <p class="font-bold text-[#f53003]">Target: Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                                    </div>

                                    <a href="{{ route('login') }}" class="block w-full text-center bg-black text-white dark:bg-white dark:text-black py-2.5 rounded-lg font-bold text-sm hover:opacity-80 transition-opacity">
                                        Donasi Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full p-20 text-center border-2 border-dashed border-[#e3e3e0] rounded-2xl">
                            <p class="text-gray-500 italic">Belum ada data donasi yang tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </main>
        </div>

        <footer class="py-10 text-[11px] text-[#706f6c] uppercase tracking-widest">
            &copy; {{ date('Y') }} BerbagiNow - Azure Production
        </footer>
    </body>
</html>
