<x-app-layout>
    <div class="py-8 animate-fade-in-up">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Alert --}}
            @if(session('success'))
                <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-emerald-200/60 bg-gradient-to-r from-emerald-50 to-teal-50 p-4 shadow-lg shadow-emerald-500/5">
                    <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-emerald-100">
                        <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <p class="text-sm font-semibold text-emerald-800">{{ session('success') }}</p>
                </div>
            @endif

            {{-- Page Header --}}
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h2 class="section-heading">🛒 Keranjang Belanja</h2>
                    <p class="section-subheading">{{ count($items) }} item di keranjang Anda</p>
                </div>
                <a href="{{ route('home') }}" class="btn-ghost !text-xs !py-2 !px-4 !rounded-xl">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Lanjut Belanja
                </a>
            </div>

            @if(count($items) === 0)
                <div class="flex flex-col items-center justify-center rounded-3xl border-2 border-dashed border-white/5 bg-[#161B29] py-24 text-center">
                    <div class="flex h-24 w-24 items-center justify-center rounded-full bg-[#0B0F1A]">
                        <svg class="h-12 w-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-white">Keranjang Kosong</h3>
                    <p class="mt-2 max-w-sm text-sm text-slate-500">Anda belum menambahkan produk. Mulai belanja sekarang!</p>
                    <a href="{{ route('home') }}" class="btn-primary mt-6 !text-xs">Mulai Belanja</a>
                </div>
            @else
                <div class="grid gap-8 lg:grid-cols-[1fr_380px]">
                    {{-- Cart Items --}}
                    <div class="space-y-4">
                        @foreach($items as $item)
                            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm transition-all hover:shadow-xl hover:border-white/10">
                                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                    <div class="flex items-center gap-4">
                                        {{-- Product Image --}}
                                        @if($item['product']->image)
                                            <img src="{{ $item['product']->image_url }}" alt="{{ $item['product']->name }}" class="h-20 w-20 flex-none rounded-2xl object-cover">
                                        @else
                                            <div class="flex h-20 w-20 flex-none items-center justify-center rounded-2xl bg-[#0B0F1A]">
                                                <svg class="h-8 w-8 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="text-sm font-bold text-white">{{ $item['product']->name }}</h4>
                                            <p class="mt-1 text-xs text-slate-500">Rp {{ number_format($item['product']->price, 0, ',', '.') }} / pcs</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <form action="{{ route('cart.update', $item['product']) }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="{{ $item['product']->stock }}" class="w-20 rounded-xl border-0 bg-[#0B0F1A] px-3 py-2 text-center text-sm font-bold text-white ring-1 ring-white/10 focus:ring-2 focus:ring-blue-500" />
                                            <button type="submit" class="rounded-xl bg-white/5 px-3 py-2 text-xs font-bold text-slate-400 transition-all hover:bg-white/10 hover:text-white border border-white/5">Update</button>
                                        </form>
                                        <form action="{{ route('cart.remove', $item['product']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="flex h-9 w-9 items-center justify-center rounded-xl text-red-400 transition-all hover:bg-red-50 hover:text-red-600">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="mt-4 flex items-center justify-between border-t border-white/5 pt-3">
                                    <span class="text-xs font-medium text-slate-500">Subtotal</span>
                                    <span class="text-sm font-black text-white">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Order Summary --}}
                    <div class="lg:sticky lg:top-24">
                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500">Ringkasan</h3>
                            <div class="mt-6 space-y-4 border-t border-white/5 pt-6">
                                @php 
                                    $shippingFee = $subtotal >= 150000 ? 0 : 15000;
                                    $grandTotal = $subtotal + $shippingFee;
                                @endphp
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-slate-400">Total ({{ count($items) }} item)</span>
                                    <span class="text-2xl font-black text-white">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-slate-400">Ongkos Kirim</span>
                                    <span class="text-sm font-bold {{ $subtotal >= 150000 ? 'text-[#10B981]' : 'text-white' }}">
                                        {{ $subtotal >= 150000 ? 'GRATIS' : 'Rp 15.000' }}
                                    </span>
                                </div>
                                @if($subtotal < 150000)
                                    <div class="rounded-xl bg-blue-500/10 p-3 text-[10px] font-bold text-blue-500">
                                        💡 Tambah Rp {{ number_format(150000 - $subtotal, 0, ',', '.') }} lagi untuk dapat GRATIS ONGKIR!
                                    </div>
                                @endif
                            </div>
                            <div class="mt-6 space-y-3">
                                <a href="{{ route('checkout') }}" class="btn-primary w-full !py-3.5 !rounded-xl !text-sm">
                                    Lanjut ke Checkout
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </a>
                                <a href="{{ route('home') }}" class="btn-secondary w-full !py-3 !rounded-xl !text-xs">Lanjut Belanja</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
