@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-white/10 bg-[#0B0F1A] text-white focus:border-blue-500 focus:ring-blue-500 rounded-xl shadow-sm']) }}>
