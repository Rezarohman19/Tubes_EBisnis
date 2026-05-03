<x-admin-layout>
    <x-slot name="title">Manajemen Kupon</x-slot>

    <div class="mt-4 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <form action="{{ route('admin.coupons.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @csrf
            <input type="text" name="code" placeholder="KODE KUPON" class="rounded-xl border-gray-300">
            <select name="type" class="rounded-xl border-gray-300">
                <option value="percent">Persentase (%)</option>
                <option value="fixed">Potongan Tetap (Rp)</option>
            </select>
            <input type="number" name="value" placeholder="Nilai" class="rounded-xl border-gray-300">
            <button type="submit" class="md:col-span-3 bg-blue-600 text-white py-2 rounded-xl">Buat Kupon</button>
        </form>
    </div>

    <div class="mt-6 rounded-2xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-4 py-3">Kode</th>
                    <th class="px-4 py-3">Tipe</th>
                    <th class="px-4 py-3">Potongan</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coupons as $coupon)
                <tr class="border-b">
                    <td class="px-4 py-3 font-bold">{{ $coupon->code }}</td>
                    <td class="px-4 py-3">{{ $coupon->type }}</td>
                    <td class="px-4 py-3">{{ number_format($coupon->value) }}</td>
                    <td class="px-4 py-3">
                        {{ $coupon->is_active ? 'Aktif' : 'Nonaktif' }}
                    </td>
                    <td class="px-4 py-3">
                        <form action="{{ route('admin.coupons.destroy', $coupon) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>