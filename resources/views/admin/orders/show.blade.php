@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center">Dettagli ordine</h1>
    <table class="table table-striped m-5">
        <thead>
            <tr>
                <th class="text-center">Codice Transazione</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Indirizzo di consegna</th>
                <th class="text-center">Email</th>
                <th class="text-center">Numero di Telefono</th>
                <th class="text-center">Note</th>
                <th class="text-center">Totale Pagato</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="pt-4 ps-3 w-auto text-center">
                    <strong>{{ $order->code }}</strong>
                </td>
                <td class="pt-3 w-auto text-center">{{ $order->name }}</td>
                <td class="pt-3 ps-3 w-auto text-center">{{ $order->address }}</td>
                <td class="pt-3 ps-3 w-auto text-center">{{ $order->email }}</td>
                <td class="pt-3 ps-3 w-auto text-center">{{ $order->telephone }}</td>
                <td class="pt-3 ps-3 w-auto text-center">{{ $order->desc }}</td>
                <td class="pt-3 ps-3 w-auto text-center">{{ number_format($order->tot,2, ',', '.')}} &euro;</td>
            </tr>
        </tbody>
    </table>
    <h2 class="text-center">I piatti ordinati</h2>
    <table class="table table-striped m-5">
        <thead>
            <tr>
                <th class="text-center">Codice</th>
                <th class="text-center">Nome</th>
                <th class="text-center">Quantità</th>
                <th class="text-center">Prezzo Unitario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish )
            <tr>
                <td class="pt-4 ps-3 w-auto text-center">
                    <strong>{{ $dish->id}}</strong>
                </td>
                <td class="pt-3 w-auto text-center">{{ $dish->name}}</td>
                <td class="pt-3 w-auto text-center">{{ $dish->pivot->quantity}}</td>
                <td class="pt-3 ps-3 w-auto text-center">{{ number_format($dish->price,2, ',', '.')}} &euro;</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

