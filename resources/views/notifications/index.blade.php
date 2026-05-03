<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-900">Notifikasi</h2>
                <p class="text-sm text-gray-500">Daftar notifikasi terbaru untuk akun Anda.</p>
            </div>

            <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                <form action="{{ route('notifications.read-all') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">Tandai Semua Dibaca</button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 rounded-2xl border border-green-200/80 bg-green-50 p-4 text-sm font-semibold text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-100 bg-gray-50 px-6 py-4">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Semua Notifikasi</h3>
                            <p class="text-sm text-gray-500">Anda dapat menandai setiap notifikasi sebagai sudah dibaca.</p>
                        </div>
                        <span class="rounded-full bg-blue-100 px-3 py-1 text-sm font-semibold text-blue-700">{{ $notifications->total() }} total</span>
                    </div>
                </div>

                @if($notifications->isEmpty())
                    <div class="p-10 text-center text-sm text-gray-500">
                        Belum ada notifikasi.
                    </div>
                @else
                    <div class="divide-y divide-gray-100">
                        @foreach($notifications as $notification)
                            <div class="flex flex-col gap-4 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex h-2.5 w-2.5 rounded-full {{ $notification->read_at ? 'bg-gray-300' : 'bg-blue-500' }}"></span>
                                        <p class="text-sm font-semibold text-gray-900">{{ data_get($notification, 'data.title', 'Notifikasi Baru') }}</p>
                                    </div>
                                    <p class="text-sm text-gray-500">{{ data_get($notification, 'data.message', 'Tidak ada deskripsi tersedia.') }}</p>
                                    <p class="text-xs text-gray-400">{{ optional($notification->created_at)->diffForHumans() }}</p>
                                </div>

                                @if(!$notification->read_at)
                                    <form action="{{ route('notifications.read', $notification->id) }}" method="POST" class="shrink-0">
                                        @csrf
                                        <button type="submit" class="rounded-xl bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-700">Tandai Dibaca</button>
                                    </form>
                                @else
                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-slate-600">Sudah dibaca</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="mt-6"> 
                {{ $notifications->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
