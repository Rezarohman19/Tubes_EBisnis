<section>
    <header>
        <h2 class="text-lg font-bold text-white">{{ __('Profile Information') }}</h2>
        <p class="mt-2 text-sm text-slate-400">{{ __("Update your account's profile information and email address.") }}</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form x-data="{ loading: false }" @submit="loading = true" method="post" action="{{ route('profile.update') }}" class="mt-6 grid gap-6">
        @csrf
        @method('patch')

        <div class="grid gap-5 md:grid-cols-2">
            <div>
                <x-input-label for="name" :value="__('Name')" class="text-slate-200" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full input-field" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-2 text-sm text-red-400" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" class="text-slate-200" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full input-field" :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-2 text-sm text-red-400" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-4 rounded-3xl border border-amber-400/10 bg-amber-500/5 p-4 text-sm text-amber-200">
                        <p>{{ __('Your email address is unverified.') }}</p>
                        <button form="send-verification" class="mt-2 inline-flex items-center gap-2 rounded-2xl border border-amber-300/20 bg-amber-500/10 px-3 py-2 text-xs font-semibold text-amber-200 transition hover:bg-amber-500/20 focus:outline-none focus:ring-2 focus:ring-amber-400">{{ __('Click here to re-send the verification email.') }}</button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-3 text-sm font-medium text-emerald-300">{{ __('A new verification link has been sent to your email address.') }}</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-start">
            <x-primary-button x-bind:disabled="loading" class="rounded-2xl px-6 py-3">
                <span x-show="!loading">{{ __('Save') }}</span>
                <span x-show="loading" class="inline-flex items-center gap-2">
                    <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path></svg>
                    {{ __('Menyimpan...') }}
                </span>
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2400)" class="text-sm text-slate-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
