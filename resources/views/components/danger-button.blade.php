<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-2.5 bg-[#EF4444] border border-transparent rounded-xl font-bold text-[10px] text-white uppercase tracking-widest hover:bg-[#EF4444]/80 active:bg-[#EF4444]/90 focus:outline-none focus:ring-2 focus:ring-[#EF4444] focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-red-500/20']) }}>
    {{ $slot }}
</button>
