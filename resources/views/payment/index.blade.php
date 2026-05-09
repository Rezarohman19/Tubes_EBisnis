<x-app-layout>
    <div class="py-8 animate-fade-in-up">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Breadcrumb --}}
            <div class="mb-6 flex items-center gap-2 text-[10px] font-black uppercase tracking-widest">
                <a href="{{ route('orders.index') }}" class="text-slate-500 hover:text-blue-500 transition-colors">PESANAN</a>
                <svg class="h-3 w-3 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/></svg>
                <span class="text-white">PEMBAYARAN #{{ $order->id }}</span>
            </div>

            {{-- Page Header --}}
            <div class="mb-8">
                <h2 class="section-heading">💳 Pembayaran</h2>
                <p class="section-subheading">Selesaikan pembayaran untuk pesanan #{{ $order->id }}</p>
            </div>

            {{-- Status Banner --}}
            @if($order->payment_status === 'paid')
                <div class="mb-8 rounded-2xl border border-[#10B981]/20 bg-[#10B981]/10 p-6">
                    <div class="flex items-center gap-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#10B981]/20">
                            <svg class="h-7 w-7 text-[#10B981]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <p class="text-lg font-black text-[#10B981]">Pembayaran Berhasil! ✓</p>
                            <p class="text-sm text-[#10B981]/80">Pesanan Anda sedang diproses. Terima kasih!</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid gap-8 lg:grid-cols-[1fr_400px]">

                {{-- Left: Payment Form --}}
                <div class="space-y-5">
                    <form action="{{ route('payment.process', $order->id) }}" method="POST" class="space-y-5">
                        @csrf

                        {{-- Payment Methods --}}
                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/5">
                                    <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                </div>
                                <div>
                                    <h3 class="text-sm font-bold text-white">Pilih Metode Pembayaran</h3>
                                    <p class="text-xs text-slate-500">Pilih metode yang paling nyaman untuk Anda</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                @foreach($paymentMethods as $method => $label)
                                    <label class="payment-option group flex cursor-pointer items-center gap-3 rounded-2xl border-2 p-4 transition-all
                                        {{ old('payment_method', $order->payment_method) === $method ? 'border-blue-500 bg-blue-500/10 shadow-lg shadow-blue-500/10' : 'border-white/5 hover:border-blue-500/50 hover:bg-white/5' }}">
                                        <input type="radio" name="payment_method" value="{{ $method }}" class="sr-only" {{ old('payment_method', $order->payment_method) === $method ? 'checked' : '' }} required>
                                        <div class="flex h-10 w-10 flex-none items-center justify-center rounded-xl bg-[#0B0F1A] shadow-sm border border-white/5 transition-all group-hover:shadow-md">
                                            @switch($method)
                                                @case('dana')    <span class="text-sm font-extrabold text-blue-600">D</span>  @break
                                                @case('gopay')   <span class="text-sm font-extrabold text-green-600">Go</span> @break
                                                @case('ovo')     <span class="text-sm font-extrabold text-purple-600">OV</span>@break
                                                @case('shopee_pay') <span class="text-sm font-extrabold text-orange-500">S</span> @break
                                                @case('qris')
                                                    <svg class="h-5 w-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h6v6H3V3zm12 0h6v6h-6V3zM3 15h6v6H3v-6zm12 0h6v6h-6v-6zM9 9h6v6H9V9z"/></svg>
                                                    @break
                                                @case('bank_transfer')
                                                    <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                                    @break
                                            @endswitch
                                        </div>
                                        <span class="text-xs font-bold text-white">{{ $label }}</span>
                                    </label>
                                @endforeach
                                @error('payment_method')
                                    <p class="col-span-2 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Payment Info --}}
                        <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                            <h4 class="text-sm font-bold text-white mb-4">📋 Informasi Pembayaran</h4>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between rounded-xl bg-[#0B0F1A] p-3">
                                    <span class="text-slate-500">No. Pesanan</span>
                                    <span class="font-bold text-white">#{{ $order->id }}</span>
                                </div>
                                <div class="flex justify-between rounded-xl bg-[#0B0F1A] p-3">
                                    <span class="text-slate-500">Tanggal</span>
                                    <span class="font-medium text-white">{{ $order->created_at->format('d F Y, H:i') }}</span>
                                </div>
                                <div class="flex justify-between rounded-xl p-3 {{ $order->payment_status === 'paid' ? 'bg-[#10B981]/10' : 'bg-[#F59E0B]/10' }}">
                                    <span class="{{ $order->payment_status === 'paid' ? 'text-[#10B981]' : 'text-[#F59E0B]' }}">Status</span>
                                    <span class="font-bold {{ $order->payment_status === 'paid' ? 'text-[#10B981]' : 'text-[#F59E0B]' }}">
                                        {{ $order->payment_status === 'paid' ? '✓ Lunas' : '⏳ Menunggu' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        @if($order->payment_status !== 'paid')
                            <button type="submit" class="btn-primary w-full !py-4 !rounded-xl !text-sm !shadow-lg">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Konfirmasi Pembayaran
                            </button>
                        @endif
                    </form>
                </div>

                {{-- Right: Order Items --}}
                <div class="lg:sticky lg:top-24">
                    <div class="rounded-2xl border border-white/5 bg-[#161B29] p-6 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Detail Pesanan</h3>
                        <div class="space-y-3">
                            @foreach($order->items as $item)
                                <div class="flex items-center justify-between gap-4 rounded-xl bg-[#0B0F1A] p-3">
                                    <div>
                                        <p class="text-sm font-bold text-white">{{ $item->product->name }}</p>
                                        <p class="text-xs text-slate-500">{{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                    <p class="text-sm font-black text-white">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</p>
                                </div>
                            @endforeach
                        </div>
 
                        <div class="mt-5 border-t border-white/5 pt-4 space-y-2">
                            <div class="flex items-center justify-between text-xs font-bold">
                                <span class="text-slate-500 uppercase tracking-widest">Subtotal</span>
                                <span class="text-white">Rp {{ number_format($order->items->sum(fn($i) => $i->price * $i->quantity), 0, ',', '.') }}</span>
                            </div>
                            @if($order->discount > 0)
                                <div class="flex items-center justify-between text-xs font-bold">
                                    <span class="text-[#10B981] uppercase tracking-widest">Diskon</span>
                                    <span class="text-[#10B981]">- Rp {{ number_format($order->discount, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            <div class="flex items-center justify-between text-xs font-bold">
                                <span class="text-slate-500 uppercase tracking-widest">Ongkos Kirim</span>
                                <span class="text-white">Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex items-center justify-between pt-3 border-t border-white/5">
                                <span class="text-sm font-black text-white uppercase tracking-widest">Total Bayar</span>
                                <span class="text-2xl font-black text-white">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <div class="mt-6 rounded-2xl bg-blue-500/10 border border-blue-500/20 p-4">
                            <p class="text-[10px] text-blue-400 font-bold leading-relaxed">
                                <strong class="text-blue-500 uppercase">📝 Catatan:</strong> Setelah konfirmasi, pesanan akan segera diproses. Anda dapat memantau status pengiriman di halaman pesanan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.payment-option input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', () => {
                document.querySelectorAll('.payment-option').forEach(label => {
                    label.classList.remove('border-blue-500', 'bg-blue-500/10', 'shadow-lg', 'shadow-blue-500/10');
                    label.classList.add('border-white/5');
                });
                radio.closest('.payment-option').classList.add('border-blue-500', 'bg-blue-500/10', 'shadow-lg', 'shadow-blue-500/10');
                radio.closest('.payment-option').classList.remove('border-white/5');
            });
        });
    </script>
</x-app-layout>