<x-admin-layout>
    <x-slot name="title">Daftar Pesanan</x-slot>

    <div class="mt-4 rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3 font-semibold text-gray-700">Order ID</th>
                    <th class="px-4 py-3 font-semibold text-gray-700">Pelanggan</th>
                    <th class="px-4 py-3 font-semibold text-gray-700">Total</th>
                    <th class="px-4 py-3 font-semibold text-gray-700">Status</th>
                    <th class="px-4 py-3 font-semibold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($orders as $order)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 font-medium">#{{ $order->id }}</td>
                    <td class="px-4 py-3">{{ $order->user->name }}</td>
                    <td class="px-4 py-3">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                    <td class="px-4 py-3">
                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium 
                            {{ $order->status === 'Selesai' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:underline">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</x-admin-layout>