@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class=" my-3 box-content table-responsive-xxl w-100">
            @if (!$orders->isEmpty())
            <h1 class="text-center">Ordini Ricevuti</h1>
            <div class="box-content table-responsive-md overflow-x-hidden w-100">
                <table class="table mb-0 bg-white table-sm table-hover w-100 text-center ">
                    <thead class="bg-light">
                    <tr>
                        <th class="text-start tab-img text-center">Data</th>
                        <th class="hide d-md-table-cell tab-date">Codice</th>
                        <th class="hide d-md-table-cell tab-roi">Nome</th>
                        <th class="tab-state tab-desc">Indirizzo</th>
                        <th class="tab-state tab-vis">Email</th>
                        <th class="tab-state tab-veg">Totale</th>
                        <th class="tab-action">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- 1 -->
                    @foreach ($orders as $order)
                    <tr class="">
                        <td class="tab-img pt-3">
                            {{ $order->created_at }}
                        </td>
                        <td class="hide d-md-table-cell pt-3">
                            {{ $order->code }}
                        </td>
                        <td class="hide d-md-table-cell pt-3">
                            {{ $order->name }}
                        </td>
                        <td class="tab-desc pt-3">
                            {{ $order->address }}
                        </td>
                        <td class="tab-vis pt-3">
                            {{ $order->email }}
                        </td>
                        <td class="tab-veg pt-3">
                            &euro;{{ number_format($order->tot, 2, ',', '.') }}
                        </td>
                        <td class=" text-center ">
                            <div class="tab-actions">
                                {{-- Show --}}
                                <div class="my-1 mx-1">
                                    <a href="{{ route('admin.orders.show', ['order' => $order]) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                                {{-- /Show --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <!-- /1 -->
                    </tbody>
                </table>
            </div>
            @else
                <h1 class="text-center">Non hai ancora ricevuto ordini</h1>
            @endif
        </div>
    </div>
@endsection
