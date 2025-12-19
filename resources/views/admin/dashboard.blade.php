<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Traviaro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.3"></script>

</head>

<body class="bg-gray-50 min-h-screen font-sans flex">
    <!-- Sidebar -->
    @include('admin.layouts.navbar')

    <div class="flex-1 ml-64">
        <!-- Header -->
        <header class="bg-[#002D62] text-white px-10 py-5 shadow-md flex justify-between items-center sticky top-0 z-40">
            <h1 class="text-2xl font-semibold tracking-wide">Admin Dashboard</h1>
            <div class="flex items-center space-x-3">
                <span class="font-medium">{{ $admin->name ?? 'Admin' }}</span>
                <img src="{{ asset('img/admin-avatar.png') }}" class="w-10 h-10 rounded-full border-2 border-white">
            </div>
        </header>

        <main class="p-10">
            <!-- Summary Cards -->
            <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                <div class="bg-white shadow-md p-6 rounded-2xl border-t-4 border-[#006994]">
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Total Bookings</h2>
                    <p class="text-3xl font-bold text-[#006994]">{{ $totalBookings }}</p>
                </div>

                <div class="bg-white shadow-md p-6 rounded-2xl border-t-4 border-[#0096c7]">
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Revenue</h2>
                    <p class="text-3xl font-bold text-[#0096c7]">₨ {{ number_format($totalRevenue, 2) }}</p>
                </div>

                <div class="bg-white shadow-md p-6 rounded-2xl border-t-4 border-[#00b4d8]">
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Profit</h2>
                    <p class="text-3xl font-bold text-[#00b4d8]">₨ {{ number_format($totalProfit, 2) }}</p>
                </div>

                <div class="bg-white shadow-md p-6 rounded-2xl border-t-4 border-[#48cae4]">
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Booking Type</h2>
                    <canvas id="typeChart" class="mt-2"></canvas>
                </div>
            </section>

            <!-- Charts -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white shadow-md p-6 rounded-2xl">
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Bookings Overview</h2>
                    <canvas id="bookingsChart"></canvas>
                </div>

                <div class="bg-white shadow-md p-6 rounded-2xl">
                    <h2 class="text-lg font-semibold text-gray-700 mb-2">Revenue Growth (LKR)</h2>
                    <canvas id="revenueChart"></canvas>
                </div>
            </section>

            <!-- Recent Reservations -->
            <section class="bg-white shadow-md rounded-2xl p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Recent Reservations</h2>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-[#006994] text-white text-left">
                                <th class="py-3 px-4">Booking ID</th>
                                <th class="py-3 px-4">Customer</th>
                                <th class="py-3 px-4">Type</th>
                                <th class="py-3 px-4">Date</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Amount (LKR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentReservations as $r)
                                <tr class="border-b text-gray-700 hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $r->id }}</td>
                                    <td class="py-3 px-4">{{ $r->customer_name ?? '—' }}</td>
                                    <td class="py-3 px-4">{{ $r->type ?? 'N/A' }}</td>
                                    <td class="py-3 px-4">{{ $r->created_at->format('Y-m-d') }}</td>
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-1 rounded-full text-sm
                                            {{ $r->status === 'Completed' ? 'bg-green-100 text-green-700' :
                                               ($r->status === 'Pending' ? 'bg-yellow-100 text-yellow-700' :
                                               'bg-red-100 text-red-700') }}">
                                            {{ $r->status ?? 'Unknown' }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">₨ {{ number_format($r->amount ?? 0, 2) }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center py-6 text-gray-500 italic">No reservations yet</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <!-- Chart.js -->
    <script>
        const bookingsData = {!! json_encode($bookingsData ?? []) !!};
        const revenueData = {!! json_encode($revenueData ?? []) !!};
        const bookingTypeData = {!! json_encode(array_values($bookingTypeData ?? [])) !!};
        const bookingTypeLabels = {!! json_encode(array_keys($bookingTypeData ?? [])) !!};

        new Chart(document.getElementById('bookingsChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Bookings',
                    data: bookingsData,
                    borderColor: '#006994',
                    backgroundColor: 'rgba(0,105,148,0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: { 
                responsive: true, 
                scales: { y: { beginAtZero: true } } 
            }
        });

        new Chart(document.getElementById('revenueChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue (LKR)',
                    data: revenueData,
                    backgroundColor: '#0096c7',
                    borderRadius: 6
                }]
            },
            options: { 
                responsive: true, 
                scales: { y: { beginAtZero: true } } 
            }
        });

        new Chart(document.getElementById('typeChart'), {
            type: 'doughnut',
            data: {
                labels: bookingTypeLabels,
                datasets: [{
                    data: bookingTypeData,
                    backgroundColor: ['#006994', '#0096c7', '#00b4d8']
                }]
            },
            options: { 
                responsive: true, 
                cutout: '70%' 
            }
        });
    </script>
</body>
</html>
