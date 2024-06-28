@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center mt-5">Dettagli ordine</h1>
<div class="d-flex justify-content-center my-3 my-md-5">

    <div class="card" style="width: 18rem;">
        <div class="card-header">
            cod: <strong>{{ $order->code }}</strong>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Indirizzo: <strong>{{ $order->address }}</strong></li>
            <li class="list-group-item">Email: <strong>{{ $order->email }}</strong></li>
            <li class="list-group-item">Telefono: <strong>{{ $order->telephone }}</strong></li>
            <li class="list-group-item">Totale: <strong>{{ number_format($order->tot,2, ',', '.')}} &euro;</strong></li>
        </ul>
    </div>
</div>
<h2 class="text-center">I piatti ordinati</h2>
<div class="box-content table-responsive-md overflow-x-hidden w-100">

    <table class="table mb-0 bg-white table-sm table-hover w-100 text-center my-3 my-md-5">
        <thead class="bg-light">
        <tr>
            <th class="text-start tab-date text-center">Codice</th>
            <th class="hide d-md-table-cell tab-date">Nome</th>
            <th class="hide d-md-table-cell tab-roi">Quantità</th>
            <th class="tab-state tab-date">Prezzo</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($dishes as $dish )
        <tr class="">
            <td class="d-md-table-cell ">
                <strong>{{ $dish->id}}</strong>
            </td>
            <td class="hide d-md-table-cell ">
                {{ $dish->name}}
            </td>
            <td class="hide d-md-table-cell">
                {{ $dish->pivot->quantity}}
            </td>
            <td class="d-md-table-cell ">
                {{ number_format($dish->price,2, ',', '.')}} &euro;
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection

