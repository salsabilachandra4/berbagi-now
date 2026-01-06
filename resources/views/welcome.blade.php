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
                
                <div class="mb-8">
                    <h1 class="text-2xl font-medium mb-1">Daftar Donasi</h1>
                    <p class="text-[#706f6c] dark:text-[#A1A09A]">Bantu sesama melalui program donasi di bawah ini.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($donations as $donation)
                        <div class="flex flex-col lg:flex-row bg-white dark:bg-[#161615] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-lg overflow-hidden border border-[#e3e3e0] dark:border-[#3E3E3A]">
                            
                            <div class="lg:w-48 h-48 lg:h-auto shrink-0 bg-gray-100 relative">
                                @if($donation->image)
                                    {{-- Menggunakan asset storage untuk memanggil gambar yang diupload --}}
                                    <img src="{{ asset('storage/' . $donation->image) }}" 
                                         class="w-full h-full object-cover" 
                                         alt="{{ $donation->title }}"
                                         onerror="this.onerror=null;this.src='https://placehold.co/400x400?text=Gambar+Tidak+Ditemukan';">
                                @else
                                    <div class="flex items-center justify-center h-full text-gray-400 text-xs italic">No Image</div>
                                @endif
                            </div>

                            <div class="p-6 flex flex-col justify-between flex-1">
                                <div>
                                    <h2 class="font-medium text-lg mb-2 dark:text-white">{{ $donation->title }}</h2>
                                    <p class="text-[13px] text-[#706f6c] dark:text-[#A1A09A] leading-relaxed line-clamp-2">
                                        {{ $donation->description }}
                                    </p>
                                </div>

                                <div class="mt-4 pt-4 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                                    <div class="mb-2">
                                        <p class="text-[11px] text-[#706f6c] uppercase tracking-wider">Dana Terkumpul</p>
                                        {{-- Menggunakan current_amount (atau 0 jika belum ada donasi masuk) --}}
                                        <p class="text-[16px] font-bold text-green-600">
                                            Rp {{ number_format($donation->current_amount ?? 0, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    
                                    <div class="flex justify-between items-end">
                                        <div>
                                            <p class="text-[10px] text-[#706f6c] uppercase italic">Target: Rp {{ number_format($donation->amount, 0, ',', '.') }}</p>
                                            <p class="text-[11px] text-blue-600 mt-1 font-medium">{{ $donation->bank_info }}</p>
                                        </div>
                                        
                                        <a href="{{ route('login') }}" class="text-[11px] bg-black text-white px-3 py-1.5 rounded hover:bg-gray-800 transition-all">
                                            Donasi
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full p-12 text-center border-2 border-dashed border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg">
                            <p class="text-[#706f6c]">Belum ada donasi tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>
            </main>
        </div>

        <footer class="py-12 text-[13px] text-[#706f6c] dark:text-gray-500">
            &copy; {{ date('Y') }} BerbagiNow - Azure Production Mode
        </footer>
    </body>
</html>
