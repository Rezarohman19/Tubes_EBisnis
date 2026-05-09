<x-admin-layout>
    <x-slot name="title">Edit Produk: {{ $product->name }}</x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form Edit Produk -->
        <div class="lg:col-span-2">
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <div class="space-y-4">
                        <!-- Nama Produk -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Nama Produk</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="mt-1 block w-full rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5" required>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Deskripsi</label>
                            <textarea name="description" rows="5" class="mt-1 block w-full rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Harga -->
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Harga (Rp)</label>
                                <input type="number" name="price" value="{{ old('price', $product->price) }}" class="mt-1 block w-full rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5" required>
                            </div>
                            
                            <!-- Penyesuaian Stok (Integrated) -->
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Penyesuaian Stok (Sisa: {{ $product->stock }})</label>
                                <input type="number" name="stock_adjustment" value="0" class="mt-1 block w-full rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5" required>
                                <p class="mt-2 text-[10px] text-slate-500 font-medium">
                                    *Gunakan <span class="text-[#10B981]">angka positif</span> untuk tambah, <span class="text-[#EF4444]">angka negatif</span> untuk kurangi.
                                </p>
                            </div>
                        </div>

                        <!-- Foto Produk -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Foto Produk</label>
                            @if($product->image)
                                <div class="mt-2 relative inline-block">
                                    <img src="{{ asset('storage/products/' . $product->image) }}" class="h-32 w-32 object-cover rounded-xl shadow-lg ring-1 ring-white/5">
                                    <span class="absolute -top-2 -right-2 flex h-5 w-5">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-5 w-5 bg-blue-500 text-[10px] text-white items-center justify-center font-black shadow-lg">!</span>
                                    </span>
                                </div>
                            @endif
                            <input type="file" name="image" class="mt-4 block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-black file:uppercase file:bg-blue-500/10 file:text-blue-500 hover:file:bg-blue-500/20 transition-all cursor-pointer">
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full rounded-xl bg-blue-600 px-4 py-3 text-sm font-bold text-white shadow-sm hover:bg-blue-700 transition-all hover:scale-[1.01] active:scale-[0.98]">
                                Simpan Semua Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Riwayat Stok (Stock Logs) -->
        <div class="lg:col-span-1">
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xs font-bold text-white uppercase tracking-wider">Riwayat Stok</h3>
                    <span class="px-2 py-1 bg-[#0B0F1A] text-[10px] font-black text-slate-500 rounded-lg border border-white/5 uppercase tracking-tighter">10 TERAKHIR</span>
                </div>
                
                <div class="flow-root">
                    <ul role="list" class="-mb-8">
                        @forelse($stockLogs as $log)
                        <li>
                            <div class="relative pb-8">
                                @if (!$loop->last)
                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-white/5"></span>
                                @endif
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full flex items-center justify-center ring-4 ring-[#161B29] 
                                            {{ $log->type === 'restock' ? 'bg-[#10B981]' : 'bg-[#F59E0B]' }}">
                                            @if($log->type === 'restock')
                                                <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            @else
                                                <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M20 12H4" />
                                                </svg>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                        <div>
                                            <p class="text-xs text-slate-400 leading-snug font-medium">
                                                {{ $log->note }}
                                                <span class="block font-black text-white mt-1">
                                                    ({{ $log->quantity_change > 0 ? '+' : '' }}{{ $log->quantity_change }}) 
                                                    <span class="font-bold text-slate-500">→ Akhir: {{ $log->quantity_after }}</span>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="whitespace-nowrap text-right text-[9px] font-bold text-slate-600 uppercase">
                                            {{ $log->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <div class="text-center py-4">
                            <p class="text-xs text-gray-400">Belum ada riwayat stok.</p>
                        </div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>