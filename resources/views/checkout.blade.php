<x-app-layout>
    <x-slot name="header">
        <nav class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 shadow-lg shadow-blue-500/30">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-extrabold text-gray-900 tracking-tight">Frozy<span class="text-blue-600">mart</span></h1>
                    <p class="text-[10px] font-medium uppercase tracking-widest text-gray-400">Checkout</p>
                </div>
            </div>
            <a href="{{ route('cart.index') }}" class="rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                ← Kembali ke Keranjang
            </a>
        </nav>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash messages --}}
            @if(session('success'))
                <div class="mb-5 flex items-center gap-3 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
                    <svg class="h-5 w-5 flex-none text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('coupon_error'))
                <div class="mb-5 flex items-center gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-800">
                    <svg class="h-5 w-5 flex-none text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    {{ session('coupon_error') }}
                </div>
            @endif

            <div class="grid gap-6 lg:grid-cols-[2fr_1.2fr]">

                {{-- ── KIRI: Form Checkout ── --}}
                <div class="space-y-5">

                    {{-- Alamat Pengiriman --}}
                    <form id="checkoutForm" action="{{ route('checkout.place') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                            <h3 class="text-base font-bold text-gray-900">1. Alamat Pengiriman</h3>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700">Alamat lengkap</label>
                                <textarea name="shipping_address" rows="3"
                                    class="mt-2 w-full rounded-xl border-gray-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Jl. Contoh No. 1, Kota, Provinsi, Kode Pos"
                                    required>{{ old('shipping_address') }}</textarea>
                                @error('shipping_address')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Metode Pembayaran --}}
                        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                            <h3 class="text-base font-bold text-gray-900">2. Metode Pembayaran</h3>
                            @error('payment_method')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <div class="mt-4 grid grid-cols-2 gap-3 sm:grid-cols-3">
                                @foreach($paymentMethods as $method => $label)
                                    <label class="payment-option flex cursor-pointer items-center gap-3 rounded-2xl border-2 p-3 transition-all
                                        {{ old('payment_method') === $method ? 'border-blue-500 bg-blue-50' : 'border-gray-200 hover:border-blue-300' }}">
                                        <input type="radio" name="payment_method" value="{{ $method }}"
                                            class="sr-only"
                                            {{ old('payment_method') === $method ? 'checked' : '' }} required>
                                        <div class="flex h-9 w-9 flex-none items-center justify-center rounded-xl bg-white shadow-sm border border-gray-100">
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
                                        <span class="text-xs font-semibold text-gray-800 leading-tight">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="w-full rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 py-4 text-sm font-bold text-white shadow-lg shadow-blue-500/30 transition-all hover:scale-[1.01] hover:shadow-xl">
                            Buat Pesanan & Bayar →
                        </button>
                    </form>
                </div>

                {{-- ── KANAN: Ringkasan & Kupon ── --}}
                <div class="space-y-5">

                    {{-- Kupon --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-900">Punya Kode Kupon?</h3>
                        @if($couponCode)
                            <div class="mt-3 flex items-center justify-between rounded-xl bg-green-50 border border-green-200 px-4 py-3">
                                <div>
                                    <p class="text-sm font-bold text-green-800">{{ $couponCode }}</p>
                                    <p class="text-xs text-green-600">Diskon: Rp {{ number_format($discount, 0, ',', '.') }}</p>
                                </div>
                                <form action="{{ route('checkout.coupon.remove') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="rounded-lg bg-red-100 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-200">Hapus</button>
                                </form>
                            </div>
                        @else
                            <form action="{{ route('checkout.coupon') }}" method="POST" class="mt-3 flex gap-2">
                                @csrf
                                <input type="text" name="coupon_code" placeholder="Masukkan kode kupon"
                                    class="flex-1 rounded-xl border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-blue-500">
                                <button type="submit" class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">Pakai</button>
                            </form>
                        @endif
                    </div>

                    {{-- Ringkasan Pesanan --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-900">Ringkasan Pesanan</h3>
                        <div class="mt-4 space-y-3">
                            @foreach($items as $item)
                                <div class="flex items-start justify-between gap-3 rounded-xl bg-gray-50 p-3">
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-gray-900 line-clamp-1">{{ $item['product']->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $item['quantity'] }} × Rp {{ number_format($item['product']->price, 0, ',', '.') }}</p>
                                    </div>
                                    <p class="flex-none text-sm font-bold text-gray-900">Rp {{ number_format($item['subtotal'], 0, ',', '.') }}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 space-y-2 border-t border-gray-100 pt-4">
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            @if($discount > 0)
                                <div class="flex justify-between text-sm text-green-600">
                                    <span>Diskon Kupon ({{ $couponCode }})</span>
                                    <span>- Rp {{ number_format($discount, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Ongkos Kirim</span>
                                <span class="text-green-600 font-semibold">{{ $grandTotal >= 150000 ? 'GRATIS' : 'Rp 15.000' }}</span>
                            </div>
                            <div class="flex justify-between border-t border-gray-200 pt-3 text-base font-extrabold text-gray-900">
                                <span>Total Bayar</span>
                                <span>Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Highlight payment method saat dipilih
        document.querySelectorAll('.payment-option input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', () => {
                document.querySelectorAll('.payment-option').forEach(label => {
                    label.classList.remove('border-blue-500', 'bg-blue-50');
                    label.classList.add('border-gray-200');
                });
                radio.closest('.payment-option').classList.add('border-blue-500', 'bg-blue-50');
                radio.closest('.payment-option').classList.remove('border-gray-200');
            });
        });
    </script>
</x-app-layout>