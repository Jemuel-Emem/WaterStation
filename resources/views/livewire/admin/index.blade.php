<div>

<div class="bg-white p-6 rounded-xl shadow-md border border-blue-100">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-bold text-blue-700">Sales Report</h2>
        <i class="ri-bar-chart-fill text-blue-600 text-2xl"></i>
    </div>


  <div class="bg-blue-50 p-3 rounded-xl">
    <canvas id="salesChart" height="140"></canvas>
</div>


    <div class="mt-4 grid grid-cols-3 text-center">
        <div>
            <p class="text-sm text-gray-500">Today</p>
            <p class="text-xl font-bold text-blue-700">
                ₱{{ number_format($todaySales, 2) }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">This Week</p>
            <p class="text-xl font-bold text-blue-700">
                ₱{{ number_format($weekSales, 2) }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">This Month</p>
            <p class="text-xl font-bold text-blue-700">
                ₱{{ number_format($monthSales, 2) }}
            </p>
        </div>
    </div>
</div>


<div class="bg-white p-6 rounded-xl shadow-md border border-blue-100">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-bold text-blue-700">Top Selling Products</h2>
        <i class="ri-water-flash-fill text-blue-600 text-2xl"></i>
    </div>

    <ul class="divide-y divide-blue-100">
        @forelse ($topProducts as $item)
            <li class="py-3 flex items-center justify-between">
                <span class="font-medium text-gray-700">{{ $item['name'] }}</span>
                <span class="text-blue-600 font-semibold">{{ $item['sold'] }} sold</span>
            </li>
        @empty
            <li class="py-3 text-gray-500 text-center">No sales yet.</li>
        @endforelse
    </ul>

    {{-- <div class="text-center mt-3">
        <button class="text-blue-700 font-medium hover:underline">
            View All Products →
        </button>
    </div> --}}
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('livewire:init', function () {
    const ctx = document.getElementById('salesChart').getContext('2d');

    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Today', 'This Week', 'This Month'],
            datasets: [{
                label: 'Sales (₱)',
                data: [
                    {{ $todaySales }},
                    {{ $weekSales }},
                    {{ $monthSales }}
                ],
                fill: true,
                borderWidth: 2,
                tension: 0.4,
                borderColor: 'rgba(30, 64, 175, 1)',
                backgroundColor: 'rgba(30, 64, 175, 0.1)',
                pointBackgroundColor: 'rgba(30, 64, 175, 1)',
                pointRadius: 5
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: value => '₱' + value
                    }
                }
            }
        }
    });
});
</script>

</div>
