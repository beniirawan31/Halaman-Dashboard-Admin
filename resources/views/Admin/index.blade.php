@extends('layouts.app')

@section('content')
    <div class="flex h-screen">
        
        @include('layouts.sidebar')

        @include('layouts.nav')

            <main class="p-6 bg-gray-100 flex-1 overflow-y-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white border-l-4 border-[#FFB200] p-6 rounded-xl shadow hover:shadow-xl transition">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold text-gray-700">Total Users</h2>
                            <div class="text-[#FFB200] text-xl font-bold">1,250</div>
                        </div>
                    </div>
                    <div class="bg-white border-l-4 border-[#EB5B00] p-6 rounded-xl shadow hover:shadow-xl transition">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold text-gray-700">Total Events</h2>
                            <div class="text-[#EB5B00] text-xl font-bold">48</div>
                        </div>
                    </div>
                    <div class="bg-white border-l-4 border-[#D91656] p-6 rounded-xl shadow hover:shadow-xl transition">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold text-gray-700">Revenue</h2>
                            <div class="text-[#D91656] text-xl font-bold">Rp 75.000.000</div>
                        </div>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center">
                        <h3 class="text-lg font-semibold mb-4 text-[#640D5F]">Statistik Penjualan</h3>
                        <div class="w-full max-w-md h-[300px]">
                            <canvas id="salesChart" class="w-full h-full"></canvas>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center">
                        <h3 class="text-lg font-semibold mb-4 text-[#640D5F]">Presentase Penjualan</h3>
                        <div class="w-full max-w-md h-[300px]">
                            <canvas id="salesPieChart" class="w-full h-full"></canvas>
                        </div>
                    </div>
                </div>
                <div class="mt-10 bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-semibold mb-6 text-[#640D5F]">Recent Transactions</h3>
                    <form action="" method="GET" class="mb-6 flex flex-wrap gap-6 items-end">
                        <div class="flex flex-col">
                            <label for="user" class="mb-1 text-sm font-medium text-gray-700">User</label>
                            <input type="text" name="user" id="user" placeholder="Cari user..."
                                class="w-48 rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#640D5F]" />
                        </div>
                        <div class="flex flex-col">
                            <label for="item" class="mb-1 text-sm font-medium text-gray-700">Item</label>
                            <input type="text" name="item" id="item" placeholder="Cari item..."
                                class="w-48 rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#640D5F]" />
                        </div>
                        <div class="flex flex-col">
                            <label for="start_date" class="mb-1 text-sm font-medium text-gray-700">Tanggal Mulai</label>
                            <input type="date" name="start_date" id="start_date"
                                class="w-40 rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#640D5F]" />
                        </div>
                        <div class="flex flex-col">
                            <label for="end_date" class="mb-1 text-sm font-medium text-gray-700">Tanggal Akhir</label>
                            <input type="date" name="end_date" id="end_date"
                                class="w-40 rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#640D5F]" />
                        </div>
                        <button type="submit"
                            class="bg-[#640D5F] hover:bg-[#D91656] text-white font-semibold px-6 py-2 rounded-md transition duration-300">Filter</button>
                    </form>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-[#640D5F]">
                                <tr>
                                    <th class="px-4 py-2 text-left text-sm font-bold text-white">No</th>
                                    <th class="px-4 py-2 text-left text-sm font-bold text-white">Nama Pembeli</th>
                                    <th class="px-4 py-2 text-left text-sm font-bold text-white">Produk</th>
                                    <th class="px-4 py-2 text-left text-sm font-bold text-white">Harga Awal</th>
                                    <th class="px-4 py-2 text-left text-sm font-bold text-white">Diskon</th>
                                    <th class="px-4 py-2 text-left text-sm font-bold text-white">Total Bayar</th>
                                    <th class="px-4 py-2 text-left text-sm font-bold text-white">Tanggal</th>
                                    {{-- <th class="px-4 py-2 text-center text-sm font-bold text-white">Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($data as $index => $item)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="p-3 text-[#640D5F] font-medium">{{ $loop->iteration }}</td>
                                        <td class="p-3 font-medium text-[#640D5F]">{{ $item->nama }}</td>
                                        <td class="p-3 text-gray-800">{{ $item->produk }}</td>
                                        <td class="p-3 text-[#FFB200] font-semibold">Rp
                                            {{ number_format($item->harga, 0, ',', '.') }}</td>
                                        <td class="p-3 text-[#EB5B00] font-semibold">{{ $item->diskon }}%</td>
                                        <td class="p-3 text-[#D91656] font-semibold">
                                            Rp {{ number_format($item->harga * (1 - $item->diskon / 100), 0, ',', '.') }}
                                        </td>
                                        <td class="p-3 text-gray-700">
                                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                        </td>
                                        {{-- <td class="p-3 text-center">
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
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $data->links('vendor.pagination.tailwind') }}
                        </div>
                    </div>

                </div>
        </div>
        </main>
    </div>undefined</div>undefined
    <!-- Chart.js CDN -->undefined
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>undefined
    <!-- Chart Scripts -->undefined
    <script>
        const labels = ['Laravel', 'Flutter', 'T-Shirt', 'Book'];
        const dataValues = [120, 90, 70, 60];
        // Bar Chart
        new Chart(document.getElementById('salesChart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Terjual',
                    data: dataValues,
                    backgroundColor: ['#FFB200', '#D91656', '#640D5F', '#EB5B00'],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: context => `${context.dataset.label}: ${context.parsed.y} item`
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 20
                        }
                    }
                }
            }
        });
        // Pie Chart
        new Chart(document.getElementById('salesPieChart'), {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Presentase',
                    data: dataValues,
                    backgroundColor: ['#FFB200', '#D91656', '#640D5F', '#EB5B00']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const value = context.parsed;
                                const percentage = ((value / total) * 100).toFixed(1);
                                return `${context.label}: ${percentage}% (${value} item)`;
                            }
                        }
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // logout
        function confirmLogout() {
            Swal.fire({
                title: 'Yakin ingin logout?',
                text: "Kamu akan keluar dari sesi saat ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, logout',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('logout') }}";
                }
            })
        }
    </script>
@endsection
