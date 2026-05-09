<x-app-layout>
    <div class="py-8 animate-fade-in-up">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Breadcrumb --}}
            <div class="mb-6 flex items-center gap-2 text-sm">
                <a href="{{ route('cart.index') }}" class="font-medium text-slate-500 hover:text-blue-500 transition-colors">Keranjang</a>
                <svg class="h-4 w-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="font-bold text-white">Checkout</span>
            </div>

            {{-- Flash messages --}}
            @if(session('success'))
                <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-emerald-200/60 bg-gradient-to-r from-emerald-50 to-teal-50 p-4 shadow-lg shadow-emerald-500/5">
                    <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-emerald-100">
                        <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <p class="text-sm font-semibold text-emerald-800">{{ session('success') }}</p>
                </div>
            @endif
            @if(session('coupon_error'))
                <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-red-200/60 bg-gradient-to-r from-red-50 to-rose-50 p-4 shadow-lg shadow-red-500/5">
                    <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-red-100">
                        <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </div>
                    <p class="text-sm font-semibold text-red-800">{{ session('coupon_error') }}</p>
                </div>
            @endif

            {{-- Page Header --}}
            <div class="mb-8">
                <h2 class="section-heading">💳 Checkout</h2>
                <p class="section-subheading">Lengkapi informasi untuk menyelesaikan pesanan</p>
            </div>

            <div class="grid gap-8 lg:grid-cols-[1fr_400px]">

                {{-- Left: Forms --}}
                <div class="space-y-5">
                    <form id="checkoutForm" action="{{ route('checkout.place') }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Shipping Address --}}
                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-xs font-bold text-white shadow-lg shadow-blue-500/30">1</div>
                                <h3 class="text-sm font-bold text-white">Alamat Pengiriman</h3>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Alamat Lengkap</label>
                                <textarea name="shipping_address" rows="3" class="input-field !rounded-xl !text-sm" placeholder="Jl. Contoh No. 1, Kota, Provinsi, Kode Pos" required>{{ old('shipping_address') }}</textarea>
                                @error('shipping_address')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Payment Method --}}
                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-xs font-bold text-white shadow-lg shadow-blue-500/30">2</div>
                                <h3 class="text-sm font-bold text-white">Metode Pembayaran</h3>
                            </div>
                            @error('payment_method')
                                <p class="mb-3 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                                @foreach($paymentMethods as $method => $label)
                                    <label class="payment-option group flex cursor-pointer items-center gap-3 rounded-2xl border-2 p-4 transition-all
                                        {{ old('payment_method') === $method ? 'border-blue-500 bg-blue-500/10 shadow-lg shadow-blue-500/10' : 'border-white/5 hover:border-blue-500/50 hover:bg-white/5' }}">
                                        <input type="radio" name="payment_method" value="{{ $method }}" class="sr-only" {{ old('payment_method') === $method ? 'checked' : '' }} required>
                                        <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-[#0B0F1A] shadow-sm border border-white/5 transition-all group-hover:shadow-md">
                                            @switch($method)
                                                @case('dana')    <span class="text-sm font-extrabold text-blue-600">D</span>  @break
                                                @case('gopay')   <span class="text-sm font-extrabold text-green-600">Go</span> @break
                                                @case('ovo')     <span class="text-sm font-extrabold text-purple-600">OV</span>@break
                                                @case('shopee_pay') <span class="text-sm font-extrabold text-orange-500">S</span> @break
                                                @case('qris')
                                                    <svg class="h-5 w-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h6v6H3V3zm12 0h6v6h-6V3zM3 15h6v6H3v-6zm12 0h6v6h-6v-6zM9 9h6v6H9V9z"/></svg>
                                                    @break
                                                @case('bank_transfer')
                                                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                                    @break
                                            @endswitch
                                        </div>
                                        <span class="text-xs font-bold text-white leading-tight">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn-primary w-full !py-4 !rounded-xl !text-sm !shadow-lg">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Buat Pesanan & Bayar
                        </button>
                    </form>
                </div>

                {{-- Right: Summary --}}
                <div class="lg:sticky lg:top-24 space-y-5">

                    {{-- Coupon --}}
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
                        <h3 class="text-sm font-bold text-white mb-3">🎟️ Kode Kupon</h3>
                        @if($couponCode)
                            <div class="flex items-center justify-between rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3">
                                <div>
                                    <p class="text-sm font-bold text-emerald-800">{{ $couponCode }}</p>
                                    <p class="text-xs text-emerald-600">Diskon: Rp {{ number_format($discount, 0, ',', '.') }}</p>
                                </div>
                                <form action="{{ route('checkout.coupon.remove') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="rounded-lg bg-red-100 px-3 py-1.5 text-xs font-bold text-red-700 hover:bg-red-200 transition-colors">Hapus</button>
                                </form>
                            </div>
                        @else
                            <form action="{{ route('checkout.coupon') }}" method="POST" class="flex gap-2">
                                @csrf
                                <input type="text" name="coupon_code" placeholder="Masukkan kode" class="input-field flex-1 !rounded-xl !text-sm !py-2.5">
                                <button type="submit" class="btn-primary !py-2.5 !px-4 !rounded-xl !text-xs">Pakai</button>
                            </form>
                        @endif
                    </div>

                    {{-- Order Summary --}}
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Ringkasan</h3>
                        <div class="space-y-3">
                            @foreach($items as $item)
                                <div class="flex items-start justify-between gap-3 rounded-xl bg-[#0B0F1A] p-3">
                                    <div class="min-w-0">
                                        <p class="text-sm font-bold text-white line-clamp-1">{{ $item['product']->name }}</p>
                                        <p class="text-xs text-slate-500">{{ $item['quantity'] }} × Rp {{ number_format($item['product']->price, 0, ',', '.') }}</p>
                                    </div>
                                    <p class="flex-none text-sm font-black text-white">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 space-y-2 border-t border-white/5 pt-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-500">Subtotal</span>
                                <span class="font-medium text-white">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            @if($discount > 0)
                                <div class="flex justify-between text-sm text-[#10B981]">
                                    <span>Diskon ({{ $couponCode }})</span>
                                    <span>- Rp {{ number_format($discount, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-500">Ongkos Kirim</span>
                                <span class="font-bold {{ $grandTotal >= 150000 ? 'text-[#10B981]' : 'text-white' }}">{{ $grandTotal >= 150000 ? 'GRATIS' : 'Rp 15.000' }}</span>
                            </div>
                            <div class="flex justify-between border-t border-white/10 pt-3">
                                <span class="text-sm font-bold text-white">Total Bayar</span>
                                <span class="text-xl font-black text-white">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.payment-option input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', () => {
                document.querySelectorAll('.payment-option').forEach(label => {
                    label.classList.remove('border-blue-500', 'bg-blue-500/10', 'shadow-lg', 'shadow-blue-500/10');
                    label.classList.add('border-white/5');
                });
                radio.closest('.payment-option').classList.add('border-blue-500', 'bg-blue-500/10', 'shadow-lg', 'shadow-blue-500/10');
                radio.closest('.payment-option').classList.remove('border-white/5');
            });
        });
    </script>
</x-app-layout>