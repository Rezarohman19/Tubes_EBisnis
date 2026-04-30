<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pesanan #{{ $order->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-6">
                    @if(session('success'))
                        <div class="rounded-lg bg-green-50 border border-green-200 p-4 text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid gap-6 lg:grid-cols-[2fr_1fr]">
                        <div class="rounded-2xl border border-gray-200 p-6 shadow-sm">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">Ringkasan Pesanan</h3>
                                    <p class="mt-1 text-sm text-gray-500">Nomor pesanan: #{{ $order->id }}</p>
                                </div>
                                <span class="rounded-full border px-3 py-1 text-sm font-medium {{ $order->payment_status === 'paid' ? 'border-green-200 text-green-700 bg-green-50' : 'border-yellow-200 text-yellow-700 bg-yellow-50' }}">
                                    {{ $order->payment_status_label }}
                                </span>
                            </div>

                            <div class="mt-6 grid gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">Metode Pembayaran</p>
                                    <p class="font-semibold text-gray-900">{{ $order->payment_method_label }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Alamat Pengiriman</p>
                                    <p class="font-semibold text-gray-900">{{ $order->shipping_address }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Total Pembayaran</p>
                                    <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($order->total,0,',','.') }}</p>
                                </div>

                                <div class="rounded-2xl bg-gray-50 p-4">
                                    <p class="font-semibold text-gray-900">Instruksi Pembayaran</p>
                                    @if($order->payment_method === 'bank_transfer')
                                        <p class="mt-3 text-sm text-gray-600">Silakan transfer ke Virtual Account berikut:</p>
                                        <p class="mt-2 font-medium text-gray-900">7001 1234 5678 9012</p>
                                        <p class="mt-1 text-sm text-gray-500">Jumlah: Rp {{ number_format($order->total,0,',','.') }}</p>
                                    @elseif($order->payment_method === 'dana')
                                        <p class="mt-3 text-sm text-gray-600">Silakan bayar melalui aplikasi DANA ke nomor:</p>
                                        <p class="mt-2 font-medium text-gray-900">0812 3456 7890</p>
                                    @else
                                        <p class="mt-3 text-sm text-gray-600">Scan QRIS berikut untuk menyelesaikan pembayaran.</p>
                                        <div class="mt-4 h-40 w-full rounded-2xl bg-white border border-dashed border-gray-300 flex items-center justify-center text-gray-400">
                                            QRIS Placeholder
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6 shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-900">Produk</h3>
                            <div class="mt-4 space-y-4">
                                @foreach($order->items as $item)
                                    <div class="rounded-2xl bg-white p-4 shadow-sm">
                                        <div class="flex items-center justify-between gap-4">
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $item->product->name }}</p>
                                                <p class="text-sm text-gray-500">{{ $item->quantity }} x Rp {{ number_format($item->price,0,',','.') }}</p>
                                            </div>
                                            <p class="font-semibold text-gray-900">Rp {{ number_format($item->price * $item->quantity,0,',','.') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if($order->payment_status !== 'paid')
                                <form action="{{ route('orders.payment.confirm', $order) }}" method="POST" class="mt-6">
                                    @csrf
                                    <button type="submit" class="w-full rounded-lg bg-green-600 px-5 py-3 text-white hover:bg-green-700">Konfirmasi Pembayaran</button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <a href="{{ route('orders.index') }}" class="inline-flex mt-6 rounded-lg bg-gray-100 px-6 py-3 text-gray-700 hover:bg-gray-200">Kembali ke Riwayat Pesanan</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
