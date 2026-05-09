<x-admin-layout>
    <x-slot name="title">Detail Pesanan #{{ $order->id }}</x-slot>
    <x-slot name="breadcrumb">
        <a href="{{ route('admin.orders.index') }}" class="hover:text-blue-500 transition-colors">Daftar Pesanan</a> / Detail
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Left: Order Info --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Status Card --}}
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#0B0F1A] border border-white/5">
                            <svg class="h-6 w-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Status Pesanan</p>
                            @php
                                $colors = [
                                    'Menunggu Pembayaran' => 'text-[#F59E0B]',
                                    'Diproses' => 'text-blue-500',
                                    'Dikirim' => 'text-indigo-500',
                                    'Selesai' => 'text-[#10B981]',
                                    'Dibatalkan' => 'text-[#EF4444]'
                                ];
                                $c = $colors[$order->status] ?? 'text-slate-500';
                            @endphp
                            <h2 class="text-xl font-black {{ $c }} uppercase">{{ $order->status }}</h2>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.orders.update-status', $order) }}" method="POST" class="flex items-center gap-2">
                        @csrf @method('PATCH')
                        <select name="status" class="rounded-xl border-white/5 bg-[#0B0F1A] text-xs font-bold text-white focus:ring-blue-500 px-4 py-2 ring-1 ring-white/5">
                            @foreach(['Menunggu Pembayaran', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'] as $st)
                                <option value="{{ $st }}" {{ $order->status === $st ? 'selected' : '' }}>{{ $st }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn-primary !py-2 !px-4 !text-[10px] !rounded-xl !font-black">UPDATE</button>
                    </form>
                </div>
            </div>

            {{-- Items Card --}}
            <div class="rounded-2xl border border-white/5 bg-[#161B29] overflow-hidden shadow-sm">
                <div class="px-6 py-4 border-b border-white/5 bg-white/5">
                    <h3 class="text-xs font-bold text-white uppercase tracking-widest">Item Pesanan</h3>
                </div>
                <table class="w-full text-sm">
                    <tbody class="divide-y divide-white/5">
                        @foreach($order->items as $item)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        @if($item->product && $item->product->image)
                                            <img src="{{ $item->product->image_url }}" class="h-12 w-12 rounded-xl object-cover ring-1 ring-white/5">
                                        @else
                                            <div class="h-12 w-12 rounded-xl bg-[#0B0F1A] flex items-center justify-center border border-white/5">
                                                <svg class="h-6 w-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                            </div>
                                        @endif
                                        <div>
                                            <p class="font-bold text-white">{{ $item->product->name ?? 'Produk Dihapus' }}</p>
                                            <p class="text-xs text-slate-500">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right font-black text-white">
                                    Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-white/5">
                        <tr>
                            <td class="px-6 py-4 text-right text-slate-500 font-bold">SUBTOTAL</td>
                            <td class="px-6 py-4 text-right font-black text-white">Rp {{ number_format($order->items->sum(fn($i) => $i->price * $i->quantity), 0, ',', '.') }}</td>
                        </tr>
                        @if($order->discount > 0)
                            <tr>
                                <td class="px-6 py-4 text-right text-[#10B981] font-bold">DISKON ({{ $order->coupon_code }})</td>
                                <td class="px-6 py-4 text-right font-black text-[#10B981]">- Rp {{ number_format($order->discount, 0, ',', '.') }}</td>
                            </tr>
                        @endif
                        <tr class="border-t border-white/10">
                            <td class="px-6 py-4 text-right text-white font-black text-lg">TOTAL AKHIR</td>
                            <td class="px-6 py-4 text-right font-black text-white text-2xl">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        {{-- Right: Customer & Shipping --}}
        <div class="space-y-6">
            {{-- Customer Info --}}
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Pelanggan</h3>
                <div class="flex items-center gap-4 mb-4">
                    <div class="h-10 w-10 rounded-full bg-blue-500/10 flex items-center justify-center border border-blue-500/20">
                        <span class="text-blue-500 font-black">{{ substr($order->user->name, 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="font-bold text-white">{{ $order->user->name }}</p>
                        <p class="text-xs text-slate-500">{{ $order->user->email }}</p>
                    </div>
                </div>
                <div class="pt-4 border-t border-white/5 space-y-3">
                    <div>
                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-tighter">Metode Pembayaran</p>
                        <p class="text-sm font-bold text-white">{{ $order->payment_method_label }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-slate-500 uppercase tracking-tighter">Tanggal Pesanan</p>
                        <p class="text-sm font-bold text-white">{{ $order->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            {{-- Shipping Address --}}
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                <h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Pengiriman</h3>
                <div class="rounded-xl bg-[#0B0F1A] p-4 border border-white/5">
                    <p class="text-sm text-white leading-relaxed">{{ $order->shipping_address }}</p>
                </div>
                
                <form action="{{ route('admin.orders.update-tracking', $order) }}" method="POST" class="mt-4 space-y-4">
                    @csrf @method('PATCH')
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Kurir</label>
                        <input type="text" name="courier" value="{{ $order->courier }}" class="w-full rounded-xl border-white/5 bg-[#0B0F1A] text-xs font-bold text-white focus:ring-blue-500 ring-1 ring-white/5">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-1">Nomor Resi</label>
                        <input type="text" name="tracking_number" value="{{ $order->tracking_number }}" class="w-full rounded-xl border-white/5 bg-[#0B0F1A] text-xs font-bold text-white focus:ring-blue-500 ring-1 ring-white/5">
                    </div>
                    <button type="submit" class="w-full btn-secondary !py-2.5 !text-[10px] !rounded-xl !font-black uppercase">SIMPAN TRACKING</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
