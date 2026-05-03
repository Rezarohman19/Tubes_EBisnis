<x-admin-layout>
    <x-slot name="title">Edit Produk: {{ $product->name }}</x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form Edit Produk -->
        <div class="lg:col-span-2">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <div class="space-y-4">
                        <!-- Nama Produk -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="description" rows="5" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <!-- Harga -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                                <input type="number" name="price" value="{{ old('price', $product->price) }}" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                            </div>
                            
                            <!-- Penyesuaian Stok (Integrated) -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Penyesuaian Stok (Stok Saat Ini: {{ $product->stock }})</label>
                                <input type="number" name="stock_adjustment" value="0" class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
                                <p class="mt-1 text-[10px] text-gray-400 font-medium">
                                    *Isi <span class="text-green-600">10</span> untuk tambah, <span class="text-red-600">-5</span> untuk kurangi, atau <span class="text-gray-600">0</span> jika tetap.
                                </p>
                            </div>
                        </div>

                        <!-- Foto Produk -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Foto Produk</label>
                            @if($product->image)
                                <div class="mt-2 relative inline-block">
                                    <img src="{{ asset('storage/products/' . $product->image) }}" class="h-32 w-32 object-cover rounded-xl shadow-sm border border-gray-100">
                                    <span class="absolute -top-2 -right-2 flex h-5 w-5">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-5 w-5 bg-blue-500 text-[10px] text-white items-center justify-center font-bold">!</span>
                                    </span>
                                </div>
                            @endif
                            <input type="file" name="image" class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
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
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider">Riwayat Stok</h3>
                    <span class="px-2 py-1 bg-gray-100 text-[10px] font-bold text-gray-600 rounded-lg">10 TERAKHIR</span>
                </div>
                
                <div class="flow-root">
                    <ul role="list" class="-mb-8">
                        @forelse($stockLogs as $log)
                        <li>
                            <div class="relative pb-8">
                                @if (!$loop->last)
                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-100"></span>
                                @endif
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-white 
                                            {{ $log->type === 'restock' ? 'bg-green-500' : 'bg-amber-500' }}">
                                            @if($log->type === 'restock')
                                                <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                            @else
                                                <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                                </svg>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                        <div>
                                            <p class="text-xs text-gray-500 leading-snug">
                                                {{ $log->note }}
                                                <span class="block font-bold text-gray-900 mt-0.5">
                                                    ({{ $log->quantity_change > 0 ? '+' : '' }}{{ $log->quantity_change }}) 
                                                    <span class="font-normal text-gray-400">→ Total: {{ $log->quantity_after }}</span>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="whitespace-nowrap text-right text-[10px] text-gray-400 italic">
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