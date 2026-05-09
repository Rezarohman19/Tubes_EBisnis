<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Pesanan #{{ $order->id }}
            </h2>
            <a href="{{ route('orders.index') }}" class="rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="flex items-center gap-3 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800">
                    <svg class="h-5 w-5 flex-none text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="flex items-center gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-800">
                    <svg class="h-5 w-5 flex-none text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    {{ session('error') }}
                </div>
            @endif
            @if(session('info'))
                <div class="flex items-center gap-3 rounded-2xl border border-blue-200 bg-blue-50 p-4 text-blue-800">
                    <svg class="h-5 w-5 flex-none text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('info') }}
                </div>
            @endif

            <div class="grid gap-6 lg:grid-cols-[1.5fr_1fr]">

                {{-- ── KIRI: Detail Pesanan ── --}}
                <div class="space-y-5">

                    {{-- Status & Info --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-medium uppercase tracking-wider text-gray-400">Nomor Pesanan</p>
                                <p class="mt-1 text-2xl font-extrabold text-gray-900">#{{ $order->id }}</p>
                                <p class="mt-1 text-sm text-gray-500">{{ $order->created_at->format('d F Y, H:i') }} WIB</p>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                {{-- Status Pesanan --}}
                                @php
                                    $statusColors = [
                                        'Menunggu Pembayaran' => 'yellow',
                                        'Diproses'            => 'blue',
                                        'Dikirim'             => 'indigo',
                                        'Selesai'             => 'green',
                                        'Dibatalkan'          => 'red',
                                    ];
                                    $sc = $statusColors[$order->status] ?? 'gray';
                                @endphp
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-{{ $sc }}-100 px-3 py-1.5 text-xs font-bold text-{{ $sc }}-700">
                                    <span class="h-2 w-2 rounded-full bg-{{ $sc }}-500"></span>
                                    {{ $order->status }}
                                </span>
                                {{-- Status Pembayaran --}}
                                @if($order->payment_status === 'paid')
                                    <span class="inline-flex items-center gap-1 rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                        Lunas
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 rounded-full bg-yellow-100 px-3 py-1 text-xs font-bold text-yellow-700">
                                        Belum Dibayar
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Progress Steps --}}
                        @php
                            $steps = ['Menunggu Pembayaran', 'Diproses', 'Dikirim', 'Selesai'];
                            $currentStep = array_search($order->status, $steps);
                            if ($currentStep === false) $currentStep = -1;
                        @endphp
                        @if($order->status !== 'Dibatalkan')
                            <div class="mt-6">
                                <div class="flex items-center justify-between">
                                    @foreach($steps as $i => $step)
                                        <div class="flex flex-col items-center {{ $i < count($steps) - 1 ? 'flex-1' : '' }}">
                                            <div class="flex items-center w-full">
                                                <div class="flex h-8 w-8 flex-none items-center justify-center rounded-full text-xs font-bold
                                                    {{ $i <= $currentStep ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-400' }}">
                                                    @if($i < $currentStep)
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                                    @else
                                                        {{ $i + 1 }}
                                                    @endif
                                                </div>
                                                @if($i < count($steps) - 1)
                                                    <div class="flex-1 h-0.5 {{ $i < $currentStep ? 'bg-blue-600' : 'bg-gray-200' }}"></div>
                                                @endif
                                            </div>
                                            <p class="mt-2 text-center text-[10px] font-medium {{ $i <= $currentStep ? 'text-blue-600' : 'text-gray-400' }}">
                                                {{ $step }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Info Pengiriman --}}
                    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-900">Informasi Pengiriman</h3>
                        <div class="mt-4 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs text-gray-400">Alamat Pengiriman</p>
                                <p class="mt-1 text-sm font-medium text-gray-900">{{ $order->shipping_address }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Metode Pembayaran</p>
                                <p class="mt-1 text-sm font-medium text-gray-900">{{ $order->payment_method_label }}</p>
                            </div>
                            @if($order->tracking_number)
                                <div>
                                    <p class="text-xs text-gray-400">Nomor Resi</p>
                                    <p class="mt-1 text-sm font-mono font-bold text-gray-900">{{ $order->tracking_number }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-400">Kurir</p>
                                    <p class="mt-1 text-sm font-medium text-gray-900">{{ $order->courier }}</p>
                                </div>
                            @endif
                            @if($order->paid_at)
                                <div>
                                    <p class="text-xs text-gray-400">Tanggal Bayar</p>
                                    <p class="mt-1 text-sm font-medium text-gray-900">{{ $order->paid_at->format('d M Y, H:i') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Aksi --}}
                    <div class="flex flex-col gap-3 sm:flex-row">
                        {{-- Konfirmasi Pembayaran --}}
                        @if($order->payment_status !== 'paid')
                            <form action="{{ route('orders.payment.confirm', $order) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 py-3 text-sm font-bold text-white shadow-lg hover:shadow-xl transition-all">
                                    ✓ Konfirmasi Pembayaran
                                </button>
                            </form>
                        @endif

                        {{-- Selesaikan Pesanan --}}
                        @if($order->status === 'Dikirim')
                            <form action="{{ route('orders.complete', $order) }}" method="POST" class="flex-1"
                                onsubmit="return confirm('Konfirmasi pesanan sudah diterima?')">
                                @csrf
                                <button type="submit" class="w-full rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 py-3 text-sm font-bold text-white shadow-lg hover:shadow-xl transition-all">
                                    ✓ Pesanan Sudah Diterima
                                </button>
                            </form>
                        @endif

                        {{-- Bayar Sekarang --}}
                        @if($order->payment_status !== 'paid' && $order->status !== 'Dibatalkan')
                            <a href="{{ route('payment.index', $order) }}" class="flex-1 flex items-center justify-center rounded-2xl border border-gray-200 bg-white py-3 text-sm font-bold text-gray-700 hover:bg-gray-50 transition-all">
                                Bayar Sekarang
                            </a>
                        @endif
                    </div>

                    @if($order->status === 'Dibatalkan' && $order->cancel_reason)
                        <div class="rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
                            <p class="font-bold">Alasan Pembatalan:</p>
                            <p class="mt-1">{{ $order->cancel_reason }}</p>
                        </div>
                    @endif
                </div>

                {{-- ── KANAN: Item & Total ── --}}
                <div class="space-y-5">
                    <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                        <h3 class="text-sm font-bold text-gray-900">Item Pesanan</h3>
                        <div class="mt-4 space-y-3">
                            @foreach($order->items as $item)
                                <div class="flex items-start justify-between gap-3 rounded-xl bg-gray-50 p-3">
                                    <div class="flex min-w-0 items-center gap-3">
                                        @if($item->product && $item->product->image)
                                            <img src="{{ $item->product->image_url }}" class="h-12 w-12 rounded-xl object-cover flex-none">
                                        @else
                                            <div class="h-12 w-12 flex-none rounded-xl bg-gray-200 flex items-center justify-center">
                                                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                            </div>
                                        @endif
                                        <div class="min-w-0">
                                            <p class="text-sm font-semibold text-gray-900 line-clamp-1">{{ $item->product->name ?? 'Produk dihapus' }}</p>
                                            <p class="text-xs text-gray-500">{{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <p class="flex-none text-sm font-bold text-gray-900">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                                </div>
                            @endforeach
                        </div>

                        {{-- Total --}}
                        <div class="mt-4 space-y-2 border-t border-gray-100 pt-4">
                            @php $subtotal = $order->items->sum(fn($i) => $i->price * $i->quantity); @endphp
                            <div class="flex justify-between text-sm text-gray-600">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            @if($order->discount > 0)
                                <div class="flex justify-between text-sm text-green-600">
                                    <span>Diskon{{ $order->coupon_code ? " ({$order->coupon_code})" : '' }}</span>
                                    <span>- Rp {{ number_format($order->discount, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            <div class="flex justify-between border-t border-gray-200 pt-3 text-base font-extrabold text-gray-900">
                                <span>Total Bayar</span>
                                <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>