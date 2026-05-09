<x-admin-layout>
    <x-slot name="title">Daftar Pesanan</x-slot>

    <div class="mt-4 rounded-2xl border border-white/5 bg-[#161B29] shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-white/5 border-b border-white/5">
                <tr>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Order ID</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Pelanggan</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Total</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Status</th>
                    <th class="px-4 py-4 text-xs font-bold text-slate-500 uppercase tracking-widest">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($orders as $order)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="px-4 py-4 font-black text-white">#{{ $order->id }}</td>
                    <td class="px-4 py-4 font-bold text-white">{{ $order->user->name }}</td>
                    <td class="px-4 py-4 font-black text-white">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                    <td class="px-4 py-4">
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
                        <span class="inline-flex items-center rounded-full {{ $c }} px-2.5 py-0.5 text-[10px] font-black uppercase">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="px-4 py-4">
                        <a href="{{ route('admin.orders.show', $order) }}" class="inline-flex items-center rounded-lg bg-blue-500/10 px-3 py-1.5 text-xs font-bold text-blue-500 hover:bg-blue-500/20 transition-all">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</x-admin-layout>