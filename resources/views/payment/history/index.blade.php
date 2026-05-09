<x-app-layout>
    <div class="py-8 animate-fade-in-up">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Alert --}}
            @if(session('success'))
                <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-emerald-200/60 bg-gradient-to-r from-emerald-50 to-teal-50 p-4 shadow-lg shadow-emerald-500/5">
                    <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-emerald-100">
                        <svg class="h-5 w-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <p class="text-sm font-semibold text-emerald-800">{{ session('success') }}</p>
                </div>
            @endif

            {{-- Page Header --}}
            <div class="mb-8">
                <h2 class="section-heading">💳 Riwayat Pembayaran</h2>
                <p class="section-subheading">Lihat semua transaksi dan status pembayaran Anda</p>
            </div>

            @if($orders->isEmpty())
                <div class="flex flex-col items-center justify-center rounded-3xl border-2 border-dashed border-white/5 bg-[#161B29] py-24 text-center">
                    <div class="flex h-24 w-24 items-center justify-center rounded-full bg-[#0B0F1A]">
                        <svg class="h-12 w-12 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-white">Belum Ada Pembayaran</h3>
                    <p class="mt-2 max-w-sm text-sm text-slate-500">Anda belum memiliki riwayat pembayaran. Mulai belanja sekarang!</p>
                    <a href="{{ route('home') }}" class="btn-primary mt-6 !text-xs">Mulai Belanja</a>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($orders as $order)
                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm transition-all hover:shadow-xl hover:border-white/10">
                            {{-- Header --}}
                            <div class="flex flex-wrap items-center justify-between gap-4">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Nomor Pesanan</p>
                                    <p class="mt-1 text-lg font-black text-white">#{{ $order->id }}</p>
                                </div>
                                <div class="text-right">
                                    @if($order->payment_status === 'paid')
                                        <span class="badge-success">
                                            <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                            Lunas
                                        </span>
                                    @else
                                        <span class="badge-warning">
                                            <span class="h-2 w-2 rounded-full bg-amber-500"></span>
                                            Menunggu
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- Details Grid --}}
                            <div class="mt-4 grid grid-cols-1 gap-4 border-t border-white/5 pt-4 md:grid-cols-3">
                                <div class="rounded-xl bg-[#0B0F1A] p-3">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Total</p>
                                    <p class="mt-1 text-xl font-black text-white">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                                </div>
                                <div class="rounded-xl bg-[#0B0F1A] p-3">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Metode</p>
                                    <p class="mt-1 text-sm font-bold text-white">{{ $order->payment_method_label }}</p>
                                </div>
                                <div class="rounded-xl bg-[#0B0F1A] p-3">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Tanggal</p>
                                    <p class="mt-1 text-sm font-bold text-white">{{ $order->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            {{-- Actions --}}
                            <div class="mt-4 flex flex-wrap gap-3 border-t border-white/5 pt-4">
                                <a href="{{ route('orders.show', $order) }}" class="btn-ghost !text-xs !py-2 !px-4 !rounded-xl !bg-white/5 border border-white/5">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                    Detail Pesanan
                                </a>
                                @if($order->payment_status !== 'paid')
                                    <a href="{{ route('payment.index', $order) }}" class="btn-primary !text-xs !py-2 !px-4 !rounded-xl !shadow-sm">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                        Bayar Sekarang
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>