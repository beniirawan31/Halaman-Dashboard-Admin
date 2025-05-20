<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-[#640D5F] ">
            <tr>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Nama Pembeli</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Produk</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Harga Awal</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Diskon</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Total Bayar</th>
                <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                <th class="px-4 py-2 text-center text-sm font-semibold text-gray-700">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($data as $item)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-3 font-medium text-[#640D5F]">{{ $item->nama }}</td>
                    <td class="p-3 text-gray-800">{{ $item->produk }}</td>
                    <td class="p-3 text-[#FFB200] font-semibold">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="p-3 text-[#EB5B00] font-semibold">{{ $item->diskon }}%</td>
                    <td class="p-3 text-[#D91656] font-semibold">
                        Rp {{ number_format($item->harga * (1 - $item->diskon / 100), 0, ',', '.') }}
                    </td>
                    <td class="p-3 text-gray-700">
                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                    </td>
                    <td class="p-3 text-center">
                        <div class="inline-flex space-x-3 justify-center">
                            <button
                                class="flex items-center space-x-1 px-3 py-1 rounded-md bg-[#FFB200] text-white cursor-not-allowed"
                                title="Edit (disabled)" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536M9 11l6-6 3 3-6 6H9v-3z" />
                                </svg>
                                <span>Edit</span>
                            </button>
                            <button
                                class="flex items-center space-x-1 px-3 py-1 rounded-md bg-[#D91656] text-white cursor-not-allowed"
                                title="Delete (disabled)" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span>Delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $data->links('vendor.pagination.tailwind') }}
    </div>
</div>