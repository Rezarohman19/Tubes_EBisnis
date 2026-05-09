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
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm transition-all hover:shadow-xl hover:border-white/10">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-bold uppercase tracking-wider text-slate-500">{{ $card['label'] }}</p>
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#0B0F1A] border border-white/5">
                        <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-3 text-3xl font-black text-white">{{ number_format($card['value']) }}</p>
            </div>
        @endforeach
    </div>

    {{-- Revenue Stats --}}
    <div class="mt-4 grid grid-cols-1 gap-4 lg:grid-cols-3">
        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Pendapatan Hari Ini</p>
            <p class="mt-2 text-2xl font-black text-white">Rp {{ number_format($stats['revenue_today'], 0, ',', '.') }}</p>
            <p class="mt-1 text-xs text-slate-500">{{ $stats['orders_today'] }} pesanan hari ini</p>
        </div>
        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Pendapatan Bulan Ini</p>
            <p class="mt-2 text-2xl font-black text-white">Rp {{ number_format($stats['revenue_month'], 0, ',', '.') }}</p>
            <p class="mt-1 text-xs text-slate-500">{{ $stats['new_users_month'] }} pengguna baru bulan ini</p>
        </div>
        <div class="rounded-2xl border border-[#EF4444]/20 bg-[#EF4444]/10 p-5 shadow-sm">
            <p class="text-xs font-bold uppercase tracking-wider text-[#EF4444]">Perhatian Stok</p>
            <p class="mt-2 text-2xl font-black text-[#EF4444]">{{ $stats['low_stock'] + $stats['out_of_stock'] }}</p>
            <p class="mt-1 text-xs text-[#EF4444]/60">{{ $stats['out_of_stock'] }} habis · {{ $stats['low_stock'] }} hampir habis</p>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
        {{-- Recent Orders --}}
        <div class="rounded-2xl border border-white/5 bg-[#161B29] shadow-sm">
            <div class="flex items-center justify-between border-b border-white/5 px-5 py-4">
                <h3 class="font-bold text-white">Pesanan Terbaru</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-xs font-bold text-blue-500 hover:text-blue-400">Lihat semua →</a>
            </div>
            <div class="divide-y divide-white/5">
                @forelse($recentOrders as $order)
                    <div class="flex items-center justify-between px-5 py-3 hover:bg-white/5 transition-colors">
                        <div>
                            <p class="text-sm font-bold text-white">#{{ $order->id }} · {{ $order->user->name }}</p>
                            <p class="text-xs text-slate-500">{{ $order->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-black text-white">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                            @php
                                $colors = [
                                    'Menunggu Pembayaran' => 'bg-[#F59E0B]/10 text-[#F59E0B]',
                                    'Diproses' => 'bg-blue-500/10 text-blue-500',
                                    'Dikirim' => 'bg-indigo-500/10 text-indigo-500',
                                    'Selesai' => 'bg-[#10B981]/10 text-[#10B981]',
                                    'Dibatalkan' => 'bg-[#EF4444]/10 text-[#EF4444]'
                                ];
                                $c = $colors[$order->status] ?? 'bg-slate-500/10 text-slate-500';
                            @endphp
                            <span class="inline-flex items-center rounded-full {{ $c }} px-2 py-0.5 text-[10px] font-bold">{{ $order->status }}</span>
                        </div>
                    </div>
                @empty
                    <p class="px-5 py-8 text-center text-sm text-slate-500">Belum ada pesanan</p>
                @endforelse
            </div>
        </div>

        {{-- Low Stock --}}
        <div class="rounded-2xl border border-white/5 bg-[#161B29] shadow-sm">
            <div class="flex items-center justify-between border-b border-white/5 px-5 py-4">
                <h3 class="font-bold text-white">Stok Menipis</h3>
                <a href="{{ route('admin.products.index', ['stock_filter' => 'low']) }}" class="text-xs font-bold text-blue-500 hover:text-blue-400">Lihat semua →</a>
            </div>
            <div class="divide-y divide-white/5">
                @forelse($lowStockProducts as $product)
                    <div class="flex items-center justify-between px-5 py-3 hover:bg-white/5 transition-colors">
                        <p class="text-sm font-bold text-white">{{ $product->name }}</p>
                        @if($product->stock === 0)
                            <span class="inline-flex items-center rounded-full bg-[#EF4444]/10 px-2.5 py-0.5 text-[10px] font-black text-[#EF4444]">Habis</span>
                        @else
                            <span class="inline-flex items-center rounded-full bg-[#F59E0B]/10 px-2.5 py-0.5 text-[10px] font-black text-[#F59E0B]">Sisa {{ $product->stock }}</span>
                        @endif
                    </div>
                @empty
                    <p class="px-5 py-8 text-center text-sm text-slate-500">Semua stok aman</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Revenue Chart (last 7 days) --}}
    <div class="mt-6 rounded-2xl border border-white/5 bg-[#161B29] p-5 shadow-sm">
        <h3 class="mb-6 font-bold text-white">Pendapatan 7 Hari Terakhir</h3>
        <div class="flex items-end gap-3 h-48 px-2">
            @php $maxRev = $revenueChart->max('revenue') ?: 1; @endphp
            @foreach($revenueChart as $day)
                @php $height = max(4, (int) ($day['revenue'] / $maxRev * 100)); @endphp
                <div class="flex flex-1 flex-col items-center gap-2 group" x-data="{ h: '{{ $height }}%' }">
                    <div class="relative w-full">
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 rounded bg-blue-500 px-1.5 py-0.5 text-[8px] font-black text-white opacity-0 transition-opacity group-hover:opacity-100">
                            {{ $day['orders'] }}
                        </div>
                        <div class="w-full rounded-t-xl bg-gradient-to-t from-blue-600/20 to-blue-500 transition-all group-hover:from-blue-600/40 group-hover:to-blue-400 shadow-lg shadow-blue-500/10" :style="'height:' + h"></div>
                    </div>
                    <p class="text-[10px] font-bold text-slate-500 group-hover:text-white transition-colors">{{ $day['date'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-admin-layout>