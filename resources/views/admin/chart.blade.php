<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Traviaro | Charts Dashboard</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.3"></script>

<style>
canvas {
    background-color: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 0.75rem;
}
</style>
</head>
<body class="bg-gray-100 flex font-sans">

<!-- Sidebar -->
@include('admin.layouts.navbar')

<!-- Main Content -->
<div class="flex-1 ml-64">

    <!-- Header -->
    <header class="bg-[#002D62] text-white px-10 py-5 shadow-md flex justify-between items-center sticky top-0 z-40">
        <h1 class="text-2xl font-semibold tracking-wide">Chart Dashboard</h1>
        <div class="flex items-center space-x-3">
            <span class="font-medium">{{ $admin->name ?? 'Admin' }}</span>
            <img src="{{ asset('img/admin-avatar.png') }}" class="w-10 h-10 rounded-full border-2 border-white">
        </div>
    </header>

    <!-- Main Charts Content -->
    <main class="w-full min-h-screen p-10 bg-gray-50 space-y-10 border-l border-gray-200">
        <!-- Filters -->
        <div class="flex flex-wrap items-center justify-between gap-4 border border-gray-200 bg-white p-6 rounded-xl shadow-sm">
            <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Charts</h1>
            <div class="flex items-center space-x-3">
                <select id="yearSelect" class="border border-gray-300 rounded-lg px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @php
                        $currentYear = now()->year;
                        $futureYears = 50;
                    @endphp
                    @for ($y = $currentYear; $y <= $currentYear + $futureYears; $y++)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endfor
                </select>

                <select id="monthSelect" class="border border-gray-300 rounded-lg px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @for ($m=1; $m<=12; $m++)
                        <option value="{{ $m }}">{{ \Carbon\Carbon::create()->month($m)->format('F') }}</option>
                    @endfor
                </select>

                <button id="loadChartsBtn" class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
                    Show Charts
                </button>
            </div>
        </div>

        <!-- Charts -->
        @foreach([
            'dailyCreatedChart' => '1️⃣ Daily Booking Created',
            'dailyTotalBookingsChart' => '2️⃣ Total Bookings by Date',
            'dailyRevenueBar' => '3️⃣ Total Daily Revenue (Bar)',
            'dailyRevenueLine' => '4️⃣ Total Daily Revenue (Line)',
            'dailyProfitBar' => '5️⃣ Total Daily Profit (Bar)',
            'dailyProfitLine' => '6️⃣ Total Daily Profit (Line)',
            'bookingTypeBar' => '7️⃣ Booking Type (Bar)',
            'bookingTypeLine' => '8️⃣ Booking Type (Line)',
        ] as $id => $title)
        <section class="bg-white p-6 rounded-2xl shadow border border-gray-200 hover:border-indigo-300 hover:shadow-md transition">
            <h2 class="text-lg font-semibold text-gray-700 mb-3">{{ $title }}</h2>
            <div class="w-full h-[400px] relative">
                <canvas id="{{ $id }}" class="w-full h-full"></canvas>
            </div>
        </section>
        @endforeach
    </main>
</div>

<script>
const charts = {};

async function fetchData() {
    const year = document.getElementById('yearSelect').value;
    const month = document.getElementById('monthSelect').value;
    try {
        const res = await fetch(`/admin/charts/data?year=${year}&month=${month}`);
        const data = await res.json();
        renderCharts(data);
    } catch(err) {
        console.error('Failed to fetch chart data:', err);
    }
}

function baseOptions(title) {
    return {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: true },
            title: { display: true, text: title }
        },
        scales: { y: { beginAtZero: true } }
    };
}

function renderCharts(data) {
    const year = document.getElementById('yearSelect').value;
    const month = document.getElementById('monthSelect').value;
    const daysInMonth = new Date(year, month, 0).getDate();
    const labels = Array.from({length: daysInMonth}, (_, i) => `${year}-${String(month).padStart(2,'0')}-${String(i+1).padStart(2,'0')}`);

    Object.values(charts).forEach(c => c.destroy());
    const ctx = id => document.getElementById(id).getContext('2d');
    const colors = {green:'#22c55e',blue:'#3b82f6',red:'#ef4444',yellow:'#facc15',lightBlue:'#60a5fa'};
    const thinBars = {maxBarThickness:25,borderRadius:6,borderSkipped:false};
    const types = ['Tours','Taxi','Activity'], typeColors = [colors.yellow,colors.red,colors.lightBlue];

    charts.dailyCreatedChart = new Chart(ctx('dailyCreatedChart'), {type:'bar', data:{labels, datasets:[{label:'Bookings Entered', data:labels.map(l=>data.dailyCreated[l]||0), backgroundColor:colors.blue}]}, options: baseOptions('Daily Booking Created')});
    charts.dailyTotalBookingsChart = new Chart(ctx('dailyTotalBookingsChart'), {type:'bar', data:{labels, datasets:[{label:'Total Bookings', data:labels.map(l=>data.dailyTotalBookings[l]||0), backgroundColor:colors.yellow}]}, options: baseOptions('Total Bookings by Travel Date')});
    charts.dailyRevenueBar = new Chart(ctx('dailyRevenueBar'), {type:'bar', data:{labels, datasets:[{label:'Revenue', data:labels.map(l=>data.dailyRevenue[l]||0), backgroundColor:colors.green, ...thinBars}]}, options: baseOptions('Total Daily Revenue')});
    charts.dailyRevenueLine = new Chart(ctx('dailyRevenueLine'), {type:'line', data:{labels, datasets:[{label:'Revenue Trend', data:labels.map(l=>data.dailyRevenue[l]||0), borderColor:colors.green, backgroundColor:colors.green+'30', fill:true}]}, options: baseOptions('Total Daily Revenue')});
    charts.dailyProfitBar = new Chart(ctx('dailyProfitBar'), {type:'bar', data:{labels, datasets:[{label:'Profit', data:labels.map(l=>data.dailyProfit[l]||0), backgroundColor:colors.blue, ...thinBars}]}, options: baseOptions('Total Daily Profit')});
    charts.dailyProfitLine = new Chart(ctx('dailyProfitLine'), {type:'line', data:{labels, datasets:[{label:'Profit Trend', data:labels.map(l=>data.dailyProfit[l]||0), borderColor:colors.blue, backgroundColor:colors.blue+'30', fill:true}]}, options: baseOptions('Total Daily Profit')});
    charts.bookingTypeBar = new Chart(ctx('bookingTypeBar'), {type:'bar', data:{labels, datasets:types.map((t,i)=>({label:t, data:labels.map(l=>data.dailyTypes[l][t]||0), backgroundColor:typeColors[i], ...thinBars}))}, options: baseOptions('Booking Type by Travel Date')});
    charts.bookingTypeLine = new Chart(ctx('bookingTypeLine'), {type:'line', data:{labels, datasets:types.map((t,i)=>({label:t, data:labels.map(l=>data.dailyTypes[l][t]||0), borderColor:typeColors[i], backgroundColor:typeColors[i]+'30', fill:true}))}, options: baseOptions('Booking Type by Travel Date')});
}

// Event listeners
document.getElementById('loadChartsBtn').addEventListener('click', fetchData);
document.getElementById('yearSelect').addEventListener('change', fetchData);
document.getElementById('monthSelect').addEventListener('change', fetchData);

// Initial load
fetchData();
</script>

</body>
</html>
