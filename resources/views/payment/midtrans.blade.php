<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 shadow-lg shadow-blue-500/30">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-extrabold text-gray-900">Pembayaran Midtrans</h1>
                    <p class="text-xs text-gray-500">Pesanan #{{ $order->id }}</p>
                </div>
            </div>
            <a href="{{ route('orders.show', $order) }}" class="rounded-xl border border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50">
                ← Kembali ke Pesanan
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            {{-- Info Pesanan --}}
            <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm mb-6">
                <h3 class="text-base font-bold text-gray-900 mb-4">Ringkasan Pembayaran</h3>
                <div class="space-y-2 text-sm text-gray-600">
                    <div class="flex justify-between">
                        <span>Nomor Pesanan</span>
                        <span class="font-semibold text-gray-900">#{{ $order->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Nama</span>
                        <span class="font-semibold text-gray-900">{{ $order->user->name }}</span>
                    </div>
                    <div class="flex justify-between border-t border-gray-100 pt-2 mt-2">
                        <span class="font-bold text-gray-900">Total Bayar</span>
                        <span class="font-extrabold text-blue-600 text-base">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            {{-- Tombol Bayar Midtrans --}}
            <div class="rounded-2xl border border-blue-100 bg-blue-50 p-6 text-center">
                <div class="mb-4">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 mb-3">
                        <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Siap untuk Membayar?</h3>
                    <p class="text-sm text-gray-600 mt-1">Klik tombol di bawah untuk membuka halaman pembayaran Midtrans yang aman.</p>
                </div>

                {{-- PERBAIKAN #6: Tombol ini memanggil Midtrans Snap dengan snapToken --}}
                <button id="pay-button"
                    class="w-full rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 py-4 text-sm font-bold text-white shadow-lg shadow-blue-500/30 transition-all hover:scale-[1.01] hover:shadow-xl">
                    💳 Bayar Sekarang — Rp {{ number_format($order->grand_total, 0, ',', '.') }}
                </button>

                <p class="mt-3 text-xs text-gray-400">
                    Pembayaran diproses secara aman oleh Midtrans.<br>
                    Mendukung: Transfer Bank, QRIS, GoPay, OVO, DANA, ShopeePay, dll.
                </p>
            </div>

            {{-- Status Info --}}
            <div class="mt-4 rounded-2xl border border-yellow-100 bg-yellow-50 p-4">
                <div class="flex items-start gap-3">
                    <svg class="h-5 w-5 flex-none text-yellow-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div class="text-sm text-yellow-800">
                        <p class="font-semibold">Informasi Penting</p>
                        <p class="mt-1">Setelah pembayaran berhasil, status pesanan akan diperbarui secara otomatis dalam beberapa menit. Jangan tutup halaman saat transaksi sedang berlangsung.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- PERBAIKAN #6: Load Midtrans Snap.js dari config --}}
    <script src="{{ config('midtrans.snap_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        document.getElementById('pay-button').onclick = function () {
            // Disable button to prevent double click
            this.disabled = true;
            this.textContent = 'Memuat halaman pembayaran...';

            snap.pay('{{ $snapToken }}', {
                onSuccess: function (result) {
                    // Pembayaran berhasil — redirect ke halaman pesanan
                    window.location.href = '{{ route("orders.show", $order) }}?payment=success';
                },
                onPending: function (result) {
                    // Menunggu pembayaran
                    window.location.href = '{{ route("orders.show", $order) }}?payment=pending';
                },
                onError: function (result) {
                    // Error pembayaran
                    alert('Pembayaran gagal. Silakan coba lagi.');
                    document.getElementById('pay-button').disabled = false;
                    document.getElementById('pay-button').textContent = '💳 Coba Lagi';
                },
                onClose: function () {
                    // User menutup popup Midtrans
                    document.getElementById('pay-button').disabled = false;
                    document.getElementById('pay-button').textContent = '💳 Bayar Sekarang — Rp {{ number_format($order->grand_total, 0, ",", ".") }}';
                }
            });
        };
    </script>
</x-app-layout>