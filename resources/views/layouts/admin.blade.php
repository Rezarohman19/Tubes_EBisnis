<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#0B0F1A] text-slate-300 selection:bg-blue-500/30 selection:text-blue-500">

<div class="flex h-screen overflow-hidden">
    {{-- Sidebar --}}
    <aside class="w-64 flex-none bg-[#161B29] border-r border-white/5 flex flex-col">
        <div class="flex items-center gap-3 px-6 py-5 border-b border-white/5">
            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-600">
                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm font-bold text-white">Frozymart</p>
                <p class="text-xs text-slate-400">Admin Panel</p>
            </div>
        </div>

        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            @php
                $navItems = [
                    ['route' => 'admin.dashboard',      'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'label' => 'Dashboard'],
                    ['route' => 'admin.products.index', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',                                                                                     'label' => 'Produk'],
                    ['route' => 'admin.orders.index',   'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',                  'label' => 'Pesanan'],
                    ['route' => 'admin.users.index',    'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'label' => 'Pengguna'],
                    ['route' => 'admin.coupons.index',  'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',                     'label' => 'Kupon'],
                ];
            @endphp

            @foreach($navItems as $item)
                @php $active = request()->routeIs($item['route'] . '*'); @endphp
                <a href="{{ route($item['route']) }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-bold transition-all
                          {{ $active ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' : 'text-slate-500 hover:bg-white/5 hover:text-white' }}">
                    <svg class="h-4 w-4 flex-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                    </svg>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="px-3 py-4 border-t border-white/5 space-y-1">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-bold text-slate-500 hover:bg-white/5 hover:text-white transition-all">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Ke Toko
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-bold text-slate-500 hover:bg-red-500/10 hover:text-red-500 transition-all">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- Main content --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Top bar --}}
        <header class="bg-[#161B29] border-b border-white/5 px-6 py-4 flex items-center justify-between flex-none">
            <div>
                @isset($title)
                    <h1 class="text-xl font-black text-white">{{ $title }}</h1>
                @endisset
                @isset($breadcrumb)
                    <p class="text-sm text-slate-500">{{ $breadcrumb }}</p>
                @endisset
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm font-bold text-slate-400">{{ Auth::user()->name }}</span>
                <span class="inline-flex items-center rounded-full bg-blue-500/10 px-2.5 py-0.5 text-xs font-black text-blue-500">ADMIN</span>
            </div>
        </header>

        {{-- Flash messages --}}
        <div class="px-6 pt-4 flex-none">
            @if(session('success'))
                <div class="mb-4 flex items-center gap-3 rounded-xl border border-[#10B981]/20 bg-[#10B981]/10 p-4 text-[#10B981]">
                    <svg class="h-5 w-5 flex-none text-[#10B981]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-4 flex items-center gap-3 rounded-xl border border-[#EF4444]/20 bg-[#EF4444]/10 p-4 text-[#EF4444]">
                    <svg class="h-5 w-5 flex-none text-[#EF4444]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    {{ session('error') }}
                </div>
            @endif
        </div>

        {{-- Page content --}}
        <main class="flex-1 overflow-y-auto px-6 pb-6">
            {{ $slot }}
        </main>
    </div>
</div>

</body>
</html>