@extends('layouts.admin')

@section('content')
    <div class="container">
        <h4 class="my-5">Ciao {{ $user->name }} {{ $user->surname }} </h4>
        <p class="mb-5">
            Queste solo le informazioni sul tuo Ristorante
        </p>
        <div class="row">
            <div class="col-md-6 mb-5">
                <div class="card" >
                    <div class="card-header">
                        {{-- @dd($restaurant) --}}
                        {{ $restaurant->name }}
                    </div>
                    <div class="card-body" style="height: 300px ">
                        <p>Nome: {{ $restaurant->name }}</p>
                        <p>Email: {{ $restaurant->email }}</p>
                        <p>Indirizzo: {{ $restaurant->address }}</p>
                        <p>P.IVA: {{ $restaurant->vat }}</p>
                    </div>
                    <div class="d-flex justify-content-center my-3" >
                        <a class="btn btn-primary me-2 " href="{{ route('admin.show', ['restaurant' => $restaurant]) }}"><i class="fa-solid fa-eye text-white"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card"  ">
                    <div class="card-header">
                        Trend Ordini
                    </div>
                    <div class="card-body" style="height: 300px">
                        <canvas id="salesChart" width="400" height="200"></canvas>
                    </div>
                    <div class="d-flex justify-content-center my-3">
                        <a href="{{ route('admin.chart.index') }}" class="btn btn-primary"><i class="fa-solid fa-eye text-white"></i></a>
                    </div>
                </div>


            </div>
        </div>


        <div class="d-flex justify-content-center my-3">


            {{-- <div class="btn btn-warning me-2 ">
                <a href="{{ route('admin.restaurants.edit', $restaurant) }}"><i class="fa-solid fa-pencil"></i></a>

            </div> --}}
            {{-- <div class="btn btn-danger">
                <a href="{{ route('admin.restaurants.destroy') }}"><i class="fa-solid fa-trash"></i></a>

            </div> --}}
        </div>

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
