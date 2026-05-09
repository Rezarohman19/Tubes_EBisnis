<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-6 py-2.5 bg-white/5 border border-white/10 rounded-xl font-bold text-[10px] text-slate-300 uppercase tracking-widest shadow-sm hover:bg-white/10 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
