<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="breadcrumb">Selamat datang, {{ Auth::user()->name }}</x-slot>

    {{-- Stats Grid --}}
    <div class="mt-4 grid grid-cols-2 gap-4 lg:grid-cols-4">
        @php
            $statCards = [
                ['label' => 'Total Produk',       'value' => $stats['total_products'],  'color' => 'blue',   'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                ['label' => 'Total Pesanan',       'value' => $stats['total_orders'],    'color' => 'indigo', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                ['label' => 'Pesanan Pending',     'value' => $stats['pending_orders'],  'color' => 'yellow', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['label' => 'Total Pengguna',      'value' => $stats['total_users'],     'color' => 'green',  'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
            ];
        @endphp
        @foreach($statCards as $card)
            <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-500">{{ $card['label'] }}</p>
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-{{ $card['color'] }}-50">
                        <svg class="h-5 w-5 text-{{ $card['color'] }}-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-3 text-3xl font-extrabold text-gray-900">{{ number_format($card['value']) }}</p>
            </div>
        @endforeach
    </div>

    {{-- Revenue Stats --}}
    <div class="mt-4 grid grid-cols-1 gap-4 lg:grid-cols-3">
        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-gray-500">Pendapatan Hari Ini</p>
            <p class="mt-2 text-2xl font-extrabold text-gray-900">Rp {{ number_format($stats['revenue_today'], 0, ',', '.') }}</p>
            <p class="mt-1 text-xs text-gray-400">{{ $stats['orders_today'] }} pesanan hari ini</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
            <p class="text-sm font-medium text-gray-500">Pendapatan Bulan Ini</p>
            <p class="mt-2 text-2xl font-extrabold text-gray-900">Rp {{ number_format($stats['revenue_month'], 0, ',', '.') }}</p>
            <p class="mt-1 text-xs text-gray-400">{{ $stats['new_users_month'] }} pengguna baru bulan ini</p>
        </div>
        <div class="rounded-2xl border border-red-100 bg-red-50 p-5 shadow-sm">
            <p class="text-sm font-medium text-red-600">Perhatian Stok</p>
            <p class="mt-2 text-2xl font-extrabold text-red-700">{{ $stats['low_stock'] + $stats['out_of_stock'] }}</p>
            <p class="mt-1 text-xs text-red-500">{{ $stats['out_of_stock'] }} habis · {{ $stats['low_stock'] }} hampir habis</p>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
        {{-- Recent Orders --}}
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4">
                <h3 class="font-semibold text-gray-900">Pesanan Terbaru</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">Lihat semua →</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($recentOrders as $order)
                    <div class="flex items-center justify-between px-5 py-3">
                        <div>
                            <p class="text-sm font-semibold text-gray-900">#{{ $order->id }} · {{ $order->user->name }}</p>
                            <p class="text-xs text-gray-400">{{ $order->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-bold text-gray-900">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                            @php
                                $colors = ['Menunggu Pembayaran' => 'yellow', 'Diproses' => 'blue', 'Dikirim' => 'indigo', 'Selesai' => 'green', 'Dibatalkan' => 'red'];
                                $c = $colors[$order->status] ?? 'gray';
                            @endphp
                            <span class="inline-flex items-center rounded-full bg-{{ $c }}-100 px-2 py-0.5 text-xs font-medium text-{{ $c }}-700">{{ $order->status }}</span>
                        </div>
                    </div>
                @empty
                    <p class="px-5 py-8 text-center text-sm text-gray-400">Belum ada pesanan</p>
                @endforelse
            </div>
        </div>

        {{-- Low Stock --}}
        <div class="rounded-2xl border border-gray-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-gray-100 px-5 py-4">
                <h3 class="font-semibold text-gray-900">Stok Menipis</h3>
                <a href="{{ route('admin.products.index', ['stock_filter' => 'low']) }}" class="text-xs font-semibold text-blue-600 hover:text-blue-700">Lihat semua →</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($lowStockProducts as $product)
                    <div class="flex items-center justify-between px-5 py-3">
                        <p class="text-sm font-medium text-gray-900">{{ $product->name }}</p>
                        @if($product->stock === 0)
                            <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-bold text-red-700">Habis</span>
                        @else
                            <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-bold text-yellow-700">Sisa {{ $product->stock }}</span>
                        @endif
                    </div>
                @empty
                    <p class="px-5 py-8 text-center text-sm text-gray-400">Semua stok aman</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Revenue Chart (last 7 days) --}}
    <div class="mt-6 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
        <h3 class="mb-4 font-semibold text-gray-900">Pendapatan 7 Hari Terakhir</h3>
        <div class="flex items-end gap-2 h-40">
            @php $maxRev = $revenueChart->max('revenue') ?: 1; @endphp
            @foreach($revenueChart as $day)
                @php $height = max(4, (int) ($day['revenue'] / $maxRev * 100)); @endphp
                <div class="flex flex-1 flex-col items-center gap-1" x-data="{ h: '{{ $height }}%' }">
                    <p class="text-xs font-bold text-gray-600">{{ $day['orders'] }}</p>
                    <div class="w-full rounded-t-lg bg-blue-500 transition-all" :style="'height:' + h"></div>
                    <p class="text-xs text-gray-400 text-center">{{ $day['date'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-admin-layout>