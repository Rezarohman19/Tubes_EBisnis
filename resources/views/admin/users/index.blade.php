<x-admin-layout>
    <x-slot name="title">Manajemen Pengguna</x-slot>

    <div class="mt-4 flex items-center justify-between gap-4">
        <form method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." 
                   class="rounded-xl border-white/5 bg-[#161B29] text-sm text-white shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2 ring-1 ring-white/5">
            <button type="submit" class="rounded-xl bg-white/5 border border-white/5 px-4 py-2 text-sm font-bold text-slate-400 hover:bg-white/10 hover:text-white transition-all">Cari</button>
        </form>
    </div>

    <div class="mt-4 rounded-2xl border border-white/5 bg-[#161B29] shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-white/5 border-b border-white/5">
                <tr>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Nama & Email</th>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Role</th>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Total Order</th>
                    <th class="px-4 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-widest">Terdaftar</th>
                    <th class="px-4 py-4"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($users as $user)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="px-4 py-4">
                        <p class="font-bold text-white">{{ $user->name }}</p>
                        <p class="text-xs text-slate-500">{{ $user->email }}</p>
                    </td>
                    <td class="px-4 py-4">
                        <span class="inline-flex rounded-full px-2.5 py-0.5 text-[10px] font-black uppercase {{ $user->role === 'admin' ? 'bg-blue-500/10 text-blue-500' : 'bg-slate-500/10 text-slate-500' }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="px-4 py-4 font-black text-white">{{ $user->orders_count }}</td>
                    <td class="px-4 py-4 text-slate-500 font-medium">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-4 text-right">
                        <form action="{{ route('admin.users.toggle-role', $user) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex items-center rounded-lg bg-white/5 px-3 py-1.5 text-xs font-bold text-slate-400 hover:bg-white/10 hover:text-white transition-all border border-white/5">Tukar Role</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $users->links() }}</div>
</x-admin-layout>