<x-admin-layout>
    <x-slot name="title">Manajemen Produk</x-slot>

    <div class="mt-4 flex flex-wrap items-center justify-between gap-4">
        <form method="GET" class="flex gap-2 flex-wrap">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." class="rounded-xl border-white/5 bg-[#161B29] text-sm text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 ring-1 ring-white/5">
            <select name="stock_filter" class="rounded-xl border-white/5 bg-[#161B29] text-sm text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 ring-1 ring-white/5">
                <option value="">Semua stok</option>
                <option value="ok"  {{ request('stock_filter') === 'ok'  ? 'selected' : '' }}>Stok aman (>10)</option>
                <option value="low" {{ request('stock_filter') === 'low' ? 'selected' : '' }}>Hampir habis (≤10)</option>
                <option value="out" {{ request('stock_filter') === 'out' ? 'selected' : '' }}>Habis</option>
            </select>
            <button type="submit" class="rounded-xl bg-white/5 border border-white/5 px-4 py-2 text-sm font-bold text-slate-400 hover:bg-white/10 hover:text-white transition-all">Filter</button>
        </form>
        <a href="{{ route('admin.products.create') }}" class="btn-primary !py-2.5 !px-6 !text-[10px] !rounded-xl !font-black">+ TAMBAH PRODUK</a>
    </div>

    <div class="mt-4 rounded-2xl border border-white/5 bg-[#161B29] shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-white/5 border-b border-white/5">
                <tr>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Produk</th>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Harga</th>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Stok</th>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Status</th>
                    <th class="px-4 py-4"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($products as $product)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-4 py-4">
                            <div class="flex items-center gap-3">
                                @if($product->image)
                                    <img src="{{ $product->image_url }}" class="h-10 w-10 rounded-lg object-cover ring-1 ring-white/5">
                                @else
                                    <div class="h-10 w-10 rounded-lg bg-[#0B0F1A] flex items-center justify-center border border-white/5">
                                        <svg class="h-5 w-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/></svg>
                                    </div>
                                @endif
                                <div>
                                    <p class="font-bold text-white">{{ $product->name }}</p>
                                    <p class="text-[10px] text-slate-500 line-clamp-1">{{ $product->description }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 font-black text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-4">
                            @if($product->stock === 0)
                                <span class="inline-flex items-center rounded-full bg-[#EF4444]/10 px-2.5 py-0.5 text-[10px] font-black text-[#EF4444]">HABIS</span>
                            @elseif($product->stock <= 10)
                                <span class="inline-flex items-center rounded-full bg-[#F59E0B]/10 px-2.5 py-0.5 text-[10px] font-black text-[#F59E0B]">{{ $product->stock }}</span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-[#10B981]/10 px-2.5 py-0.5 text-[10px] font-black text-[#10B981]">{{ $product->stock }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-4">
                            @if($product->stock > 0)
                                <span class="inline-flex rounded-full bg-blue-500/10 px-2 py-0.5 text-[10px] font-bold text-blue-500">AKTIF</span>
                            @else
                                <span class="inline-flex rounded-full bg-slate-500/10 px-2 py-0.5 text-[10px] font-bold text-slate-500">NONAKTIF</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center rounded-lg bg-blue-500/10 px-3 py-1.5 text-xs font-bold text-blue-500 hover:bg-blue-500/20 transition-all">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="inline-flex items-center rounded-lg bg-[#EF4444]/10 px-3 py-1.5 text-xs font-bold text-[#EF4444] hover:bg-[#EF4444]/20 transition-all">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-16 text-center text-slate-500 font-medium">Tidak ada produk ditemukan</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $products->links() }}</div>
</x-admin-layout>