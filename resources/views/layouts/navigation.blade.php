<nav x-data="{ open: false }" class="bg-slate-950/95 border-b border-white/10 shadow-sm shadow-slate-950/20 backdrop-blur-xl">
    <!-- Primary Navigation Menu -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 py-3">
            <div class="flex items-center gap-4">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-8 w-auto fill-current text-white" />
                    </a>
                </div>
                <div class="hidden sm:flex items-center gap-4 text-sm font-semibold uppercase tracking-[0.18em] text-slate-300">
                    <a href="{{ route('dashboard') }}" class="transition hover:text-white">{{ __('Dashboard') }}</a>
                    <a href="{{ route('products.index') }}" class="transition hover:text-white">{{ __('Katalog') }}</a>
                    <a href="{{ route('cart.index') }}" class="transition hover:text-white">{{ __('Keranjang') }} @if(session('cart') && count(session('cart')) > 0) ({{ count(session('cart')) }}) @endif</a>
                    <a href="{{ route('orders.index') }}" class="transition hover:text-white">{{ __('Pesanan') }}</a>
                    <a href="{{ route('payment.history') }}" class="transition hover:text-white">{{ __('Pembayaran') }}</a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 rounded-2xl border border-white/10 bg-white/5 px-3 py-2 text-sm font-semibold text-slate-200 transition hover:border-white/20 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4 text-slate-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if(Auth::user()->role === 'admin')
                                <x-dropdown-link :href="route('admin.dashboard')" class="font-bold text-indigo-300 hover:text-indigo-200">
                                    {{ __('Admin Panel') }}
                                </x-dropdown-link>
                                <div class="border-t border-white/10"></div>
                            @endif

                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center gap-4">
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-300 transition hover:text-white">Log in</a>
                        <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 rounded-2xl bg-blue-600 text-xs font-semibold uppercase tracking-[0.24em] text-white transition hover:bg-blue-500">Register</a>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-white/5 p-2 text-slate-300 transition hover:bg-white/10 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div x-show="open" x-transition class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1 bg-slate-950/95 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                {{ __('Katalog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.*')">
                {{ __('Keranjang') }} @if(session('cart') && count(session('cart')) > 0) ({{ count(session('cart')) }}) @endif
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.*')">
                {{ __('Pesanan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('payment.history')" :active="request()->routeIs('payment.*')">
                {{ __('Pembayaran') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-white/10 bg-slate-950/95">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-slate-400">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Admin Panel Link Mobile -->
                    @if(Auth::user()->role === 'admin')
                        <x-responsive-nav-link :href="route('admin.dashboard')" class="font-bold text-indigo-300">
                            {{ __('Admin Panel') }}
                        </x-responsive-nav-link>
                    @endif

                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Log in') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>