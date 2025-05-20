@extends('layouts.app') @section('content')
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-[#640D5F] to-[#D91656] text-white p-6 space-y-6 shadow-lg">
            <div class="text-2xl font-bold mb-8">Admin Panel</div>
            <nav class="flex flex-col space-y-4 text-sm font-medium">
                <a href="#"
                    class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all duration-300 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                    </svg> Dashboard </a>
                <a href="#" class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all">Users</a>
                <a href="#" class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all">Events</a>
                <a href="#" class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all">Books</a>
                <a href="#" class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all">T-Shirts</a>
                <a href="#" class="hover:bg-[#FFB200] hover:text-black p-2 rounded-md transition-all">Settings</a>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-bold text-[#640D5F]">Dashboard</h1>
                <div class="flex items-center gap-4">
                    <span class="text-gray-600">Hello, Admin</span>
                    <img src="https://i.pravatar.cc/40" class="rounded-full w-10 h-10" alt="Avatar" />

                    <!-- Tombol Logout -->
                    <button onclick="confirmLogout()"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition-all">
                        Logout
                    </button>
                </div>
            </header>
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
                        <table class="w-full text-left text-sm border border-gray-200 rounded-md">
                            <thead class="bg-gradient-to-r from-[#EB5B00] to-[#FFB200] text-white">
                                <tr>
                                    <th class="p-3">User</th>
                                    <th class="p-3">Item</th>
                                    <th class="p-3">Amount</th>
                                    <th class="p-3">Date</th>
                                    <th class="p-3 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-3 font-medium text-gray-700">Budi</td>
                                    <td class="p-3">Laravel Training</td>
                                    <td class="p-3 text-green-600 font-semibold">Rp 500.000</td>
                                    <td class="p-3">19 Mei 2025</td>
                                    <td class="p-3 text-center">
                                        <div class="inline-flex space-x-3 justify-center">
                                            <button
                                                class="flex items-center space-x-1 px-3 py-1 rounded-md bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white transition duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                                                title="Edit" aria-label="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536M9 11l6-6 3 3-6 6H9v-3z" />
                                                </svg>
                                                <span>Edit</span>
                                            </button>
                                            <button
                                                class="flex items-center space-x-1 px-3 py-1 rounded-md bg-red-100 text-red-700 hover:bg-red-600 hover:text-white transition duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400"
                                                title="Delete" aria-label="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-3 font-medium text-gray-700">Sari</td>
                                    <td class="p-3">Flutter Book</td>
                                    <td class="p-3 text-green-600 font-semibold">Rp 250.000</td>
                                    <td class="p-3">18 Mei 2025</td>
                                    <td class="p-3 text-center">
                                        <div class="inline-flex space-x-3 justify-center">
                                            <button
                                                class="flex items-center space-x-1 px-3 py-1 rounded-md bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white transition duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                                                title="Edit" aria-label="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536M9 11l6-6 3 3-6 6H9v-3z" />
                                                </svg>
                                                <span>Edit</span>
                                            </button>
                                            <button
                                                class="flex items-center space-x-1 px-3 py-1 rounded-md bg-red-100 text-red-700 hover:bg-red-600 hover:text-white transition duration-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400"
                                                title="Delete" aria-label="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
