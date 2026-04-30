<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-[1.4fr_1fr]">
                <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                    @if($product->image)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-96 w-full rounded-3xl object-cover" />
                    @else
                        <div class="mb-6 flex h-96 items-center justify-center rounded-3xl bg-gray-100 text-gray-400">Tidak ada foto produk</div>
                    @endif

                    <div class="mt-8 space-y-5">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h3>
                            <p class="mt-3 text-gray-600">{{ $product->description }}</p>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl bg-gray-50 p-5">
                                <p class="text-sm text-gray-500">Harga</p>
                                <p class="mt-2 text-2xl font-semibold text-gray-900">Rp {{ number_format($product->price,0,',','.') }}</p>
                            </div>
                            <div class="rounded-2xl bg-gray-50 p-5">
                                <p class="text-sm text-gray-500">Ketersediaan</p>
                                <p class="mt-2 text-xl font-semibold text-gray-900">{{ $product->stock }} pcs</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm">
                    <div class="space-y-6">
                        <div class="rounded-3xl bg-indigo-50 p-5">
                            <h3 class="text-lg font-semibold text-indigo-900">Selesaikan pembelian</h3>
                            <p class="mt-2 text-sm text-indigo-700">Tambahkan produk ini ke keranjang dan lanjutkan ke checkout.</p>
                        </div>

                        <form action="{{ route('cart.add') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div>
                                <label class="text-sm font-medium text-gray-700">Jumlah</label>
                                <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="mt-2 w-full rounded-xl border-gray-300 p-3 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>
                            <button type="submit" class="w-full rounded-2xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white hover:bg-indigo-700">Tambah ke Keranjang</button>
                        </form>

                        <a href="{{ route('cart.index') }}" class="block rounded-2xl border border-gray-200 bg-white px-4 py-3 text-center text-sm font-semibold text-gray-700 hover:bg-gray-50">Lihat Keranjang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
