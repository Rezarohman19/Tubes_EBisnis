<x-admin-layout>
    <x-slot name="title">Tambah Produk</x-slot>

    <div class="mt-4 max-w-2xl">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm space-y-5">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Nama Produk</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="mt-1 w-full rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5">
                    @error('name')<p class="mt-1 text-xs text-[#EF4444]">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Deskripsi</label>
                    <textarea name="description" rows="4" required class="mt-1 w-full rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5">{{ old('description') }}</textarea>
                    @error('description')<p class="mt-1 text-xs text-[#EF4444]">{{ $message }}</p>@enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Harga (Rp)</label>
                        <input type="number" name="price" value="{{ old('price') }}" min="0" required class="mt-1 w-full rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5">
                        @error('price')<p class="mt-1 text-xs text-[#EF4444]">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Stok Awal</label>
                        <input type="number" name="stock" value="{{ old('stock', 0) }}" min="0" required class="mt-1 w-full rounded-xl border-white/5 bg-[#0B0F1A] text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 ring-1 ring-white/5">
                        @error('stock')<p class="mt-1 text-xs text-[#EF4444]">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">Foto Produk</label>
                    <input type="file" name="image" accept="image/*" class="mt-2 block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-black file:uppercase file:bg-blue-500/10 file:text-blue-500 hover:file:bg-blue-500/20 transition-all cursor-pointer">
                    @error('image')<p class="mt-1 text-xs text-[#EF4444]">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="flex gap-3">
                <button type="submit" class="btn-primary !py-3 !px-8 !text-xs !rounded-xl !font-black shadow-lg shadow-blue-600/20">SIMPAN PRODUK</button>
                <a href="{{ route('admin.products.index') }}" class="btn-secondary !py-3 !px-8 !text-xs !rounded-xl !font-black">BATAL</a>
            </div>
        </form>
    </div>
</x-admin-layout>