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
                    <p class="text-[10px] font-medium uppercase tracking-widest text-gray-400">Premium Frozen Food</p>
                </div>
            </div>
            <div class="hidden items-center gap-1 md:flex">
                <a href="{{ route('dashboard') }}" class="group relative rounded-xl px-4 py-2.5 text-sm font-bold text-gray-700 transition-all hover:bg-blue-50">
                    <span class="relative flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </span>
                    <span class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ route('products.index') }}" class="group relative rounded-xl px-4 py-2.5 text-sm font-bold text-gray-700 transition-all hover:bg-blue-50">
                    <span class="relative flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        Katalog
                    </span>
                    <span class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ route('cart.index') }}" class="group relative rounded-xl px-4 py-2.5 text-sm font-bold text-gray-700 transition-all hover:bg-blue-50">
                    <span class="relative flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Keranjang
                    </span>
                    <span class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ route('orders.index') }}" class="group relative rounded-xl px-4 py-2.5 text-sm font-bold text-gray-700 transition-all hover:bg-blue-50">
                    <span class="relative flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Pesanan
                    </span>
                    <span class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ route('payment.history') }}" class="group relative rounded-xl px-4 py-2.5 text-sm font-bold text-gray-700 transition-all hover:bg-blue-50">
                    <span class="relative flex items-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        Pembayaran
                    </span>
                    <span class="absolute bottom-0 left-1/2 h-0.5 w-0 -translate-x-1/2 bg-blue-600 transition-all group-hover:w-full"></span>
                </a>
            </div>
            <button class="flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-600 md:hidden">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 rounded-2xl border border-green-100 bg-green-50 p-6">
                        <h3 class="text-lg font-semibold text-green-900">Pembayaran Pesanan</h3>
                        <p class="mt-2 text-sm text-green-700">Selesaikan pembayaran Anda untuk memproses pesanan Frozymart.</p>
                    </div>

                    <div class="grid gap-6 lg:grid-cols-[2fr_1.1fr]">
                        <div class="space-y-6">
                            <form action="{{ route('payment.process', $order->id) }}" method="POST" class="space-y-6">
                                @csrf

                                <div class="rounded-2xl border border-gray-200 p-6 shadow-sm">
                                    <h4 class="text-lg font-semibold text-gray-900">Metode Pembayaran</h4>
                                    <div class="mt-4 space-y-3">
                                        @foreach($paymentMethods as $method => $label)
                                            <label class="flex items-center gap-3 rounded-2xl border p-4 hover:border-green-500 cursor-pointer">
                                                <input type="radio" name="payment_method" value="{{ $method }}" class="h-4 w-4 text-green-600" {{ old('payment_method', $order->payment_method) === $method ? 'checked' : '' }} required>
                                                <span class="text-sm font-medium text-gray-800">{{ $label }}</span>
                                            </label>
                                        @endforeach
                                        @error('payment_method')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="rounded-2xl border border-gray-200 p-6 shadow-sm">
                                    <h4 class="text-lg font-semibold text-gray-900">Informasi Pembayaran</h4>
                                    <div class="mt-4 space-y-3 text-sm text-gray-600">
                                        <p><strong>No. Pesanan:</strong> #{{ $order->id }}</p>
                                        <p><strong>Tanggal:</strong> {{ $order->created_at->format('d F Y, H:i') }}</p>
                                        <p><strong>Status:</strong> 
                                            @if($order->payment_status === 'paid')
                                                <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Lunas</span>
                                            @else
                                                <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800">Menunggu Pembayaran</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <button type="submit" class="w-full rounded-lg bg-green-600 px-6 py-3 text-white font-semibold hover:bg-green-700">
                                    Konfirmasi Pembayaran
                                </button>
                            </form>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900">Detail Pesanan</h4>
                            <div class="mt-4 space-y-4">
                                @foreach($order->items as $item)
                                    <div class="flex items-center justify-between gap-4 rounded-2xl bg-white p-4">
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $item->product->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $item->quantity }} x Rp {{ number_format($item->price,0,',','.') }}</p>
                                        </div>
                                        <p class="font-semibold text-gray-900">Rp {{ number_format($item->quantity * $item->price,0,',','.') }}</p>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-6 border-t border-gray-200 pt-4">
                                <div class="flex items-center justify-between text-gray-700">
                                    <span>Total Pembayaran</span>
                                    <span class="text-xl font-bold text-gray-900">Rp {{ number_format($order->total,0,',','.') }}</span>
                                </div>
                            </div>

                            <div class="mt-4 rounded-2xl bg-blue-50 p-4">
                                <p class="text-sm text-blue-700">
                                    <strong>Catatan:</strong> Setelah melakukan pembayaran, pesanan akan diproses. Anda dapat melihat status pesanan di halaman pesanan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>