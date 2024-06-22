@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- @dd($restaurant) --}}
        <div class=" my-3 box-content table-responsive-xxl w-100">
{{-- @dd(empty($orders['items']))
            @if (!empty($orders['items']))
            <p>Non ci sono ordini</p>
            @else --}}
            <h1 class="text-center">Ordini Ricevuti</h1>
            <table class="table table-striped m-5">
                <thead>
                    <tr>
                        <th class="text-center">Codice</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Indirizzo</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Telefono</th>
                        <th class="text-center">Totale</th>
                        <th class="text-center">Descrizione</th>
                        <th class="text-center">Operazioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>

                        <td class="pt-4 w-auto text-center">{{ $order->code }}</td>
                        <td class="pt-4 w-auto text-center">{{ $order->name }}</td>

                        <td class="pt-4 ps-3 w-auto text-center">{{ $order->address }}</td>
                        <td class="pt-4 ps-3 w-auto text-center">{{ $order->email }}</td>
                        <td class="pt-4 ps-3 w-auto text-center">{{ $order->telephone }}</td>
                        <td class="pt-4 ps-3 w-auto text-center">&euro; {{ number_format($order->tot, 2, ',', '.') }}</td>
                        <td class="pt-4 ps-3 w-auto text-center">{{ $order->desc }}</td>
                        <td class="pt-4 ps-3 w-auto text-center"><a href="{{ route('admin.orders.show', ['order' => $order]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- @endif --}}
        </div>
    </div>
    @endsection
