<x-app-layout>
    <div class="py-8 animate-fade-in-up">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Breadcrumb --}}
            <div class="mb-6 flex items-center gap-2 text-sm">
                <a href="{{ route('orders.index') }}" class="font-medium text-slate-500 hover:text-blue-500 transition-colors">Pesanan</a>
                <svg class="h-4 w-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="font-bold text-white">Detail #{{ $order->id }}</span>
            </div>

            {{-- Flash Messages --}}
            @foreach(['success' => 'emerald', 'error' => 'red', 'info' => 'blue'] as $type => $color)
                @if(session($type))
                    <div class="mb-6 flex animate-slide-down items-center gap-3 rounded-2xl border border-{{ $color }}-500/20 bg-{{ $color }}-500/10 p-4">
                        <svg class="h-5 w-5 flex-none text-{{ $color }}-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if($type === 'error')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            @endif
                        </svg>
                        <p class="text-sm font-semibold text-{{ $color }}-400">{{ session($type) }}</p>
                    </div>
                @endif
            @endforeach

            <div class="grid gap-8 lg:grid-cols-[1.5fr_1fr]">

                {{-- Left: Order Details --}}
                <div class="space-y-5">

                    {{-- Status & Info Card --}}
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Nomor Pesanan</p>
                                <p class="mt-1 text-3xl font-black text-white">#{{ $order->id }}</p>
                                <p class="mt-1 text-sm text-slate-500">{{ $order->created_at->format('d F Y, H:i') }} WIB</p>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                @php
                                    $statusMap = [
                                        'Menunggu Pembayaran'     => ['bg' => 'bg-[#F59E0B]/10', 'text' => 'text-[#F59E0B]', 'ring' => 'ring-[#F59E0B]/20', 'dot' => 'bg-[#F59E0B]'],
                                        'Pembayaran Dikonfirmasi' => ['bg' => 'bg-blue-500/10',   'text' => 'text-blue-500',   'ring' => 'ring-blue-500/20',   'dot' => 'bg-blue-500'],
                                        'Diproses'                => ['bg' => 'bg-blue-500/10',   'text' => 'text-blue-500',   'ring' => 'ring-blue-500/20',   'dot' => 'bg-blue-500'],
                                        'Dikirim'                 => ['bg' => 'bg-indigo-500/10', 'text' => 'text-indigo-500', 'ring' => 'ring-indigo-500/20', 'dot' => 'bg-indigo-500'],
                                        'Selesai'                 => ['bg' => 'bg-[#10B981]/10',  'text' => 'text-[#10B981]',  'ring' => 'ring-[#10B981]/20',  'dot' => 'bg-[#10B981]'],
                                        'Dibatalkan'              => ['bg' => 'bg-[#EF4444]/10',  'text' => 'text-[#EF4444]',  'ring' => 'ring-[#EF4444]/20',  'dot' => 'bg-[#EF4444]'],
                                    ];
                                    $s = $statusMap[$order->status] ?? ['bg' => 'bg-slate-500/10', 'text' => 'text-slate-500', 'ring' => 'ring-slate-500/20', 'dot' => 'bg-slate-500'];
                                @endphp
                                <span class="inline-flex items-center gap-1.5 rounded-full {{ $s['bg'] }} px-3 py-1.5 text-xs font-bold {{ $s['text'] }} ring-1 {{ $s['ring'] }}">
                                    <span class="h-2 w-2 rounded-full {{ $s['dot'] }}"></span>
                                    {{ $order->status }}
                                </span>
                                @if($order->payment_status === 'paid')
                                    <span class="badge-success">
                                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                        Lunas
                                    </span>
                                @elseif($order->payment_status === 'proof_uploaded')
                                    <span class="badge-info">⏳ Menunggu Verifikasi</span>
                                @else
                                    <span class="badge-warning">Belum Dibayar</span>
                                @endif
                            </div>
                        </div>

                        {{-- Progress Steps --}}
                        @php
                            $steps = ['Menunggu Pembayaran', 'Diproses', 'Dikirim', 'Selesai'];
                            $currentStep = array_search($order->status, $steps);
                            if ($currentStep === false) $currentStep = -1;
                        @endphp
                        @if($order->status !== 'Dibatalkan')
                            <div class="mt-8">
                                <div class="flex items-center justify-between">
                                    @foreach($steps as $i => $step)
                                        <div class="flex flex-col items-center {{ $i < count($steps) - 1 ? 'flex-1' : '' }}">
                                            <div class="flex items-center w-full">
                                                <div class="flex h-9 w-9 flex-none items-center justify-center rounded-full text-xs font-bold transition-all
                                                    {{ $i <= $currentStep ? 'bg-blue-500 text-white shadow-lg shadow-blue-500/30' : 'bg-[#0B0F1A] text-slate-700 border border-white/5' }}">
                                                    @if($i < $currentStep)
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                                    @else
                                                        {{ $i + 1 }}
                                                    @endif
                                                </div>
                                                @if($i < count($steps) - 1)
                                                    <div class="flex-1 h-0.5 mx-2 rounded-full {{ $i < $currentStep ? 'bg-blue-500' : 'bg-white/5' }} transition-all"></div>
                                                @endif
                                            </div>
                                            <p class="mt-2 text-center text-[10px] font-bold {{ $i <= $currentStep ? 'text-blue-500' : 'text-slate-700' }}">
                                                {{ $step }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    {{-- Bukti Pembayaran --}}
                    @if($order->payment_proof)
                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                            <h3 class="text-sm font-bold text-white mb-4">📎 Bukti Pembayaran</h3>
                            <div class="flex items-start gap-4">
                                <a href="{{ asset('storage/payment_proofs/' . $order->payment_proof) }}" target="_blank">
                                    <img src="{{ asset('storage/payment_proofs/' . $order->payment_proof) }}"
                                         alt="Bukti Pembayaran"
                                         class="h-32 w-32 rounded-xl object-cover ring-2 ring-white/5 hover:ring-blue-500/50 transition">
                                </a>
                                <div class="space-y-2">
                                    @if($order->payment_proof_uploaded_at)
                                        <p class="text-xs text-slate-500">Dikirim: {{ $order->payment_proof_uploaded_at->format('d M Y, H:i') }}</p>
                                    @endif
                                    @if($order->payment_status === 'proof_uploaded')
                                        <span class="badge-info text-[10px]">⏳ Menunggu Verifikasi Admin</span>
                                    @elseif($order->payment_status === 'paid')
                                        <span class="badge-success text-[10px]">✓ Dikonfirmasi</span>
                                    @elseif($order->payment_status === 'rejected')
                                        <div>
                                            <span class="badge-danger text-[10px]">✕ Ditolak</span>
                                            @if($order->payment_rejection_reason)
                                                <p class="mt-1 text-xs text-red-400">{{ $order->payment_rejection_reason }}</p>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Shipping Info --}}
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        <h3 class="text-sm font-bold text-white mb-4">📦 Informasi Pengiriman</h3>
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="rounded-xl bg-[#0B0F1A] p-4">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Alamat</p>
                                <p class="mt-1 text-sm font-medium text-white">{{ $order->shipping_address }}</p>
                            </div>
                            <div class="rounded-xl bg-[#0B0F1A] p-4">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Metode Bayar</p>
                                <p class="mt-1 text-sm font-medium text-white">{{ $order->payment_method_label }}</p>
                            </div>
                            @if($order->tracking_number)
                                <div class="rounded-xl bg-blue-500/10 p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-blue-500/60">Nomor Resi</p>
                                    <p class="mt-1 text-sm font-mono font-bold text-blue-500">{{ $order->tracking_number }}</p>
                                </div>
                                <div class="rounded-xl bg-blue-500/10 p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-blue-500/60">Kurir</p>
                                    <p class="mt-1 text-sm font-medium text-blue-500">{{ $order->courier }}</p>
                                </div>
                            @endif
                            @if($order->paid_at)
                                <div class="rounded-xl bg-[#10B981]/10 p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-wider text-[#10B981]/60">Tanggal Bayar</p>
                                    <p class="mt-1 text-sm font-medium text-[#10B981]">{{ $order->paid_at->format('d M Y, H:i') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col gap-3 sm:flex-row">
                        @if($order->status === 'Dikirim')
                            <form action="{{ route('orders.complete', $order) }}" method="POST" class="flex-1"
                                  onsubmit="return confirm('Konfirmasi pesanan sudah diterima?')">
                                @csrf
                                <button type="submit"
                                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-600 py-3 text-xs font-bold text-white shadow-lg shadow-emerald-500/30 transition-all hover:shadow-xl">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Pesanan Sudah Diterima
                                </button>
                            </form>
                        @endif
                        @if($order->canUploadProof())
                            <a href="{{ route('payment.index', $order) }}"
                               class="btn-primary flex-1 !py-3 !rounded-xl !text-xs text-center">
                                💳 Bayar / Upload Bukti
                            </a>
                        @elseif($order->payment_status !== 'paid' && !$order->isCod() && $order->status !== 'Dibatalkan')
                            <a href="{{ route('payment.index', $order) }}"
                               class="btn-secondary flex-1 !py-3 !rounded-xl !text-xs text-center">
                                Lihat Info Pembayaran
                            </a>
                        @endif
                    </div>

                    @if($order->status === 'Dibatalkan' && $order->cancel_reason)
                        <div class="rounded-2xl border border-red-500/20 bg-red-500/10 p-5">
                            <p class="text-xs font-bold text-red-400">⚠ Alasan Pembatalan:</p>
                            <p class="mt-1 text-sm text-red-400/80">{{ $order->cancel_reason }}</p>
                        </div>
                    @endif

                    {{-- ── SECTION ULASAN ───────────────────────────────────── --}}
                    @if($order->status === 'Selesai')
                        @php
                            $reviewedIds = $order->items
                                ->filter(fn($i) => $i->product)
                                ->map(fn($i) => $i->product_id)
                                ->filter(fn($pid) => \App\Models\Review::where('order_id', $order->id)
                                    ->where('user_id', Auth::id())
                                    ->where('product_id', $pid)
                                    ->exists()
                                )->values()->toArray();

                            $allReviewed = $order->items
                                ->filter(fn($i) => $i->product)
                                ->every(fn($i) => in_array($i->product_id, $reviewedIds));

                            $hasAnyReview = count($reviewedIds) > 0;
                        @endphp

                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                            <div class="flex items-center justify-between mb-5">
                                <div>
                                    <h3 class="text-sm font-bold text-white">⭐ Ulasan Produk</h3>
                                    <p class="text-xs text-slate-500 mt-1">
                                        @if($allReviewed)
                                            Semua produk sudah diulas. Terima kasih!
                                        @elseif($hasAnyReview)
                                            {{ count($reviewedIds) }} dari {{ $order->items->filter(fn($i)=>$i->product)->count() }} produk sudah diulas.
                                        @else
                                            Bagikan pengalaman Anda tentang produk ini.
                                        @endif
                                    </p>
                                </div>
                                @if(!$allReviewed)
                                    <a href="{{ route('reviews.create', $order) }}"
                                       class="btn-primary !text-xs !py-2 !px-5 !rounded-xl">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        {{ $hasAnyReview ? 'Lanjut Ulas' : 'Beri Ulasan' }}
                                    </a>
                                @endif
                            </div>

                            {{-- Tampilkan ulasan yang sudah ada --}}
                            @if($hasAnyReview)
                                <div class="space-y-3">
                                    @foreach($order->items as $item)
                                        @if(!$item->product) @continue @endif
                                        @php
                                            $review = \App\Models\Review::where('order_id', $order->id)
                                                ->where('user_id', Auth::id())
                                                ->where('product_id', $item->product_id)
                                                ->first();
                                        @endphp
                                        @if($review)
                                            <div class="rounded-xl bg-[#0B0F1A] p-4 border border-white/5">
                                                <div class="flex items-start gap-3">
                                                    @if($item->product->image)
                                                        <img src="{{ $item->product->image_url }}" class="h-10 w-10 rounded-lg object-cover flex-none">
                                                    @endif
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-bold text-white">{{ $item->product->name }}</p>
                                                        <div class="mt-1 flex items-center gap-1">
                                                            @for($star = 1; $star <= 5; $star++)
                                                                <svg class="h-4 w-4 {{ $star <= $review->rating ? 'fill-amber-400 text-amber-400' : 'fill-slate-700 text-slate-700' }}" viewBox="0 0 20 20">
                                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.616 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                                                </svg>
                                                            @endfor
                                                            <span class="ml-1 text-xs text-slate-500">{{ $review->created_at->format('d M Y') }}</span>
                                                        </div>
                                                        @if($review->comment)
                                                            <p class="mt-2 text-sm text-slate-400">{{ $review->comment }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                            @if($allReviewed)
                                <div class="mt-4 flex items-center gap-2 rounded-xl bg-emerald-500/10 border border-emerald-500/20 p-3">
                                    <svg class="h-5 w-5 flex-none text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <p class="text-xs font-bold text-emerald-400">Terima kasih sudah memberikan ulasan!</p>
                                </div>
                            @endif
                        </div>
                    @endif

                </div>

                {{-- Right: Items & Total --}}
                <div class="lg:sticky lg:top-24">
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500">Item Pesanan</h3>
                        <div class="mt-4 space-y-3">
                            @foreach($order->items as $item)
                                <div class="flex items-start justify-between gap-3 rounded-xl bg-[#0B0F1A] p-3">
                                    <div class="flex min-w-0 items-center gap-3">
                                        @if($item->product && $item->product->image)
                                            <img src="{{ $item->product->image_url }}" class="h-12 w-12 rounded-xl object-cover flex-none">
                                        @else
                                            <div class="h-12 w-12 flex-none rounded-xl bg-white/5 flex items-center justify-center border border-white/5">
                                                <svg class="h-6 w-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                            </div>
                                        @endif
                                        <div class="min-w-0">
                                            <p class="text-sm font-bold text-white line-clamp-1">{{ $item->product->name ?? 'Produk dihapus' }}</p>
                                            <p class="text-xs text-slate-500">{{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <p class="flex-none text-sm font-black text-white">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                                </div>
                            @endforeach
                        </div>

                        {{-- Total --}}
                        <div class="mt-5 space-y-2 border-t border-white/5 pt-4">
                            @php $subtotal = $order->items->sum(fn($i) => $i->price * $i->quantity); @endphp
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-500">Subtotal</span>
                                <span class="font-medium text-white">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            @if($order->discount > 0)
                                <div class="flex justify-between text-sm text-[#10B981]">
                                    <span>Diskon{{ $order->coupon_code ? " ({$order->coupon_code})" : '' }}</span>
                                    <span>- Rp {{ number_format($order->discount, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-500">Ongkos Kirim</span>
                                <span class="font-bold {{ ($order->shipping_cost ?? 0) == 0 ? 'text-[#10B981]' : 'text-white' }}">
                                    {{ ($order->shipping_cost ?? 0) == 0 ? 'GRATIS' : 'Rp ' . number_format($order->shipping_cost, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="flex justify-between border-t border-white/10 pt-3">
                                <span class="text-sm font-bold text-white">Total Bayar</span>
                                <span class="text-xl font-black text-white">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>