<x-admin-layout>
    <x-slot name="title">Detail Pengguna: {{ $user->name }}</x-slot>
    <x-slot name="breadcrumb">
        <a href="{{ route('admin.users.index') }}" class="hover:text-blue-500 transition-colors">Manajemen Pengguna</a> / Detail
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Profile Card --}}
        <div class="lg:col-span-1">
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-8 shadow-sm text-center">
                <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-[#0B0F1A] border-4 border-white/5 shadow-2xl">
                    <span class="text-4xl font-black text-blue-500">{{ substr($user->name, 0, 1) }}</span>
                </div>
                <h2 class="mt-6 text-2xl font-black text-white leading-tight">{{ $user->name }}</h2>
                <p class="text-sm font-bold text-slate-500 mt-1 uppercase tracking-widest">{{ $user->email }}</p>
                
                <div class="mt-6 flex flex-wrap justify-center gap-2">
                    <span class="inline-flex items-center rounded-full px-3 py-1 text-[10px] font-black uppercase tracking-widest {{ $user->role === 'admin' ? 'bg-blue-500/10 text-blue-500 border border-blue-500/20' : 'bg-slate-500/10 text-slate-500 border border-white/5' }}">
                        {{ $user->role }}
                    </span>
                    <span class="inline-flex items-center rounded-full bg-indigo-500/10 text-indigo-500 border border-indigo-500/20 px-3 py-1 text-[10px] font-black uppercase tracking-widest">
                        Customer ID: #{{ $user->id }}
                    </span>
                </div>

                <div class="mt-8 grid grid-cols-2 gap-4 border-t border-white/5 pt-8">
                    <div class="text-center">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Total Order</p>
                        <p class="text-xl font-black text-white">{{ $user->orders_count }}</p>
                    </div>
                    <div class="text-center">
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Terdaftar</p>
                        <p class="text-sm font-black text-white">{{ $user->created_at->format('M Y') }}</p>
                    </div>
                </div>

                <div class="mt-8 pt-8 border-t border-white/5">
                    <form action="{{ route('admin.users.toggle-role', $user) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full btn-secondary !py-3 !text-[10px] !rounded-xl !font-black uppercase tracking-widest shadow-lg">
                            TUKAR ROLE AKUN
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Order History --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-2xl border border-white/5 bg-[#161B29] shadow-sm overflow-hidden">
                <div class="flex items-center justify-between border-b border-white/5 px-6 py-5 bg-white/5">
                    <h3 class="text-xs font-black text-white uppercase tracking-widest">Riwayat Pesanan</h3>
                    <span class="px-3 py-1 bg-[#0B0F1A] text-[10px] font-black text-slate-500 rounded-lg border border-white/5">TOTAL: {{ $orders->total() }}</span>
                </div>
                <div class="divide-y divide-white/5">
                    @forelse($orders as $order)
                        <div class="flex items-center justify-between px-6 py-4 hover:bg-white/5 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#0B0F1A] border border-white/5">
                                    <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-black text-white">#{{ $order->id }}</p>
                                    <p class="text-[10px] font-bold text-slate-500">{{ $order->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-black text-white mb-1">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
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
                                <span class="inline-flex items-center rounded-full {{ $c }} px-2 py-0.5 text-[9px] font-black uppercase tracking-tighter">{{ $order->status }}</span>
                            </div>
                            <div class="ml-6">
                                <a href="{{ route('admin.orders.show', $order) }}" class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white/5 text-slate-500 hover:bg-blue-500/10 hover:text-blue-500 transition-all border border-white/5">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="py-20 text-center">
                            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#0B0F1A] border border-white/5 mb-4">
                                <svg class="h-8 w-8 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            </div>
                            <p class="text-sm font-bold text-slate-500">Pengguna ini belum memiliki pesanan.</p>
                        </div>
                    @endforelse
                </div>
                @if($orders->hasPages())
                    <div class="px-6 py-4 bg-white/5 border-t border-white/5">
                        {{ $orders->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
