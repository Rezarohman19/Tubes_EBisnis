<x-admin-layout>
    <x-slot name="title">Manajemen Produk</x-slot>

    <div class="mt-4 flex flex-wrap items-center justify-between gap-4">
        <form method="GET" class="flex gap-2 flex-wrap">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." class="rounded-xl border-gray-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2">
            <select name="stock_filter" class="rounded-xl border-gray-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2">
                <option value="">Semua stok</option>
                <option value="ok"  {{ request('stock_filter') === 'ok'  ? 'selected' : '' }}>Stok aman (>10)</option>
                <option value="low" {{ request('stock_filter') === 'low' ? 'selected' : '' }}>Hampir habis (≤10)</option>
                <option value="out" {{ request('stock_filter') === 'out' ? 'selected' : '' }}>Habis</option>
            </select>
            <button type="submit" class="rounded-xl bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-200">Filter</button>
        </form>
        <a href="{{ route('admin.products.create') }}" class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">+ Tambah Produk</a>
    </div>

    <div class="mt-4 rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Produk</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Harga</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Stok</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                @if($product->image)
                                    <img src="{{ $product->image_url }}" class="h-10 w-10 rounded-lg object-cover">
                                @else
                                    <div class="h-10 w-10 rounded-lg bg-gray-100 flex items-center justify-center">
                                        <svg class="h-5 w-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/></svg>
                                    </div>
                                @endif
                                <div>
                                    <p class="font-semibold text-gray-900">{{ $product->name }}</p>
                                    <p class="text-xs text-gray-400 line-clamp-1">{{ $product->description }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 font-semibold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            @if($product->stock === 0)
                                <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-bold text-red-700">Habis</span>
                            @elseif($product->stock <= 10)
                                <span class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-bold text-yellow-700">{{ $product->stock }}</span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-bold text-green-700">{{ $product->stock }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if($product->stock > 0)
                                <span class="inline-flex rounded-full bg-green-100 px-2 py-0.5 text-xs font-medium text-green-700">Aktif</span>
                            @else
                                <span class="inline-flex rounded-full bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-500">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center rounded-lg bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700 hover:bg-blue-100">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="ml-2 inline-flex items-center rounded-lg bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700 hover:bg-red-100">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-10 text-center text-gray-400">Tidak ada produk ditemukan</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $products->links() }}</div>
</x-admin-layout>