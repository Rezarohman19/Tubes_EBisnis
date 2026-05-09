<x-app-layout>
    <div class="py-8 animate-fade-in-up">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Breadcrumb --}}
            <div class="mb-6 flex items-center gap-2 text-[10px] font-black uppercase tracking-widest">
                <a href="{{ route('products.index') }}" class="text-slate-500 hover:text-blue-500 transition-colors">KATALOG</a>
                <svg class="h-3 w-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                <span class="text-white">{{ $product->name }}</span>
            </div>

            <div class="grid gap-8 lg:grid-cols-[1.4fr_1fr]">
                {{-- Left: Product Image & Info --}}
                <div class="space-y-6">
                    <div class="overflow-hidden rounded-3xl border border-white/5 bg-[#161B29] shadow-sm ring-1 ring-white/5">
                        @if($product->image)
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="aspect-[4/3] w-full object-cover transition-transform duration-700 hover:scale-105" />
                        @else
                            <div class="flex aspect-[4/3] items-center justify-center bg-[#0B0F1A]">
                                <div class="text-center">
                                    <svg class="mx-auto h-20 w-20 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <p class="mt-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Tidak ada foto produk</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Product Details --}}
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-8 shadow-sm">
                        <h2 class="text-3xl font-black text-white leading-tight">{{ $product->name }}</h2>
                        <p class="mt-4 text-sm leading-relaxed text-slate-500">{{ $product->description }}</p>

                        <div class="mt-8 grid grid-cols-2 gap-6">
                            <div class="rounded-2xl bg-[#0B0F1A] border border-white/5 p-6 transition-all hover:border-blue-500/30">
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">Harga Terbaik</p>
                                <p class="text-3xl font-black text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            </div>
                            <div class="rounded-2xl bg-[#0B0F1A] border border-white/5 p-6 transition-all hover:border-[#10B981]/30">
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">Stok Tersedia</p>
                                <p class="text-3xl font-black text-white">{{ $product->stock }} <span class="text-xs font-bold text-slate-500 uppercase ml-1">pcs</span></p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Purchase Card --}}
                <div class="lg:sticky lg:top-24">
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        <div class="rounded-2xl bg-[#0B0F1A] border border-white/5 p-5 mb-6">
                            <h3 class="text-xs font-black text-white uppercase tracking-widest">🛒 Beli Sekarang</h3>
                            <p class="mt-2 text-[10px] text-slate-500 leading-relaxed">Tambahkan ke keranjang untuk menikmati frozen food kualitas premium kami.</p>
                        </div>

                        @if($product->stock > 0)
                            @auth
                                <form action="{{ route('cart.add') }}" method="POST" class="space-y-4">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div>
                                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-500 mb-2">Jumlah Pesanan</label>
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-full rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5 px-4 py-3" />
                                    </div>

                                    <div class="flex items-center justify-between rounded-xl bg-[#0B0F1A] p-4 border border-white/5">
                                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Total Harga</span>
                                        <span class="text-xl font-black text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>

                                    <button type="submit" class="btn-primary w-full !py-4 !rounded-xl !text-xs !font-black uppercase tracking-widest shadow-lg shadow-blue-600/20">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                        Tambah ke Keranjang
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn-primary w-full !py-4 !rounded-xl !text-xs !font-black uppercase tracking-widest">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                                    Login untuk Membeli
                                </a>
                            @endauth
                        @else
                            <button disabled class="flex w-full items-center justify-center gap-2 rounded-xl bg-white/5 py-4 text-[10px] font-black text-slate-600 cursor-not-allowed border border-white/5 uppercase tracking-widest">Stok Habis</button>
                        @endif

                        <a href="{{ route('cart.index') }}" class="btn-secondary w-full !py-3 !rounded-xl !text-[10px] !font-black uppercase tracking-widest mt-4">LIHAT KERANJANG</a>

                        {{-- Trust Badges --}}
                        <div class="mt-8 space-y-4 border-t border-white/5 pt-8">
                            @foreach([
                                ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'text' => 'PRODUK 100% ORIGINAL', 'color' => 'text-[#2563EB]'],
                                ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'text' => 'PENGIRIMAN SAME-DAY', 'color' => 'text-[#10B981]'],
                                ['icon' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z', 'text' => 'PEMBAYARAN AMAN & CEPAT', 'color' => 'text-[#F59E0B]'],
                            ] as $badge)
                                <div class="flex items-center gap-4">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#0B0F1A] border border-white/5">
                                        <svg class="h-4 w-4 {{ $badge['color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="{{ $badge['icon'] }}"/></svg>
                                    </div>
                                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">{{ $badge['text'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
