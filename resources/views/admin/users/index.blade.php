<x-admin-layout>
    <x-slot name="title">Manajemen Pengguna</x-slot>

    <div class="mt-4 flex items-center justify-between gap-4">
        <form method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." 
                   class="rounded-xl border-gray-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-2">
            <button type="submit" class="rounded-xl bg-gray-100 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-200">Cari</button>
        </form>
    </div>

    <div class="mt-4 rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nama & Email</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Role</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Total Order</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Terdaftar</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <p class="font-semibold text-gray-900">{{ $user->name }}</p>
                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                    </td>
                    <td class="px-4 py-3">
                        <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-medium {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-gray-600">{{ $user->orders_count }}</td>
                    <td class="px-4 py-3 text-gray-500">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="px-4 py-3 text-right">
                        <form action="{{ route('admin.users.toggle-role', $user) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs font-semibold text-blue-600 hover:underline">Tukar Role</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $users->links() }}</div>
</x-admin-layout>