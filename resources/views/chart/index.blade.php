@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1>Statistiche degli Ordini</h1>
    <p>Ristorante: {{ $restaurant->name }}</p>

    <canvas id="salesChart" width="400" height="200"></canvas>

    <table class="table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Numero di Ordini</th>
                <th>Vendite Totali (€)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistics as $stat)
                <tr>
                    <td>{{ $stat->date }}</td>
                    <td>{{ $stat->total_orders }}</td>
                    <td>{{ number_format($stat->total_sales, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Prepare the data for Chart.js
        const statistics = @json($statistics);

        const labels = statistics.map(stat => stat.date);
        const totalSales = statistics.map(stat => stat.total_sales);

        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Vendite Totali (€)',
                        data: totalSales,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        fill: false,
                        yAxisID: 'y'
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        position: 'left',
                        title: {
                            display: true,
                            text: 'Vendite Totali (€)'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
