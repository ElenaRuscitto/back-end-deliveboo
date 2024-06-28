@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- @dd($restaurant) --}}
        <div class=" my-3 box-content table-responsive-xxl w-100">
{{-- @dd(empty($orders['items']))
            @if (!empty($orders['items']))
            <p>Non ci sono ordini</p>
            @else --}}
            @if (!$orders->isEmpty())
            {{-- @if (empty($orders)) --}}
            <h1 class="text-center">Ordini Ricevuti</h1>
            {{-- <table class="table table-striped m-5">
                <thead>
                    <tr>
                        <th class="text-center">Data</th>
                        <th class="text-center">Codice</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Indirizzo</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Totale</th>
                        <th class="text-center">Operazioni</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td class="pt-4 ps-3 w-auto text-center">
                            <strong>{{ $order->created_at }}</strong>
                        </td>
                        <td class="pt-4 w-auto text-center">
                            <strong>{{ $order->code }}</strong>
                        </td>
                        <td class="pt-4 w-auto text-center">{{ $order->name }}</td>

                        <td class="pt-4 ps-3 w-auto text-center">{{ $order->address }}</td>
                        <td class="pt-4 ps-3 w-auto text-center">{{ $order->email }}</td>
                        <td class="pt-4 ps-3 w-auto text-center">&euro; {{ number_format($order->tot, 2, ',', '.') }}</td>

                        <td class="pt-4 ps-3 w-auto text-center"><a href="{{ route('admin.orders.show', ['order' => $order]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                <h2 class="text-center my-5">Non ci sono ordini</h2>

                @endif
            </table> --}}




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
                        <td class="tab-img ">
                            {{ $order->created_at }}
                        </td>
                        <td class="hide d-md-table-cell ">
                            {{ $order->code }}
                        </td>
                        <td class="hide d-md-table-cell">
                            {{ $order->name }}
                        </td>
                        <td class="tab-desc">
                            {{ $order->address }}
                        </td>
                        <td class="tab-vis">
                            {{ $order->email }}
                        </td>
                        <td class="tab-veg">
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
            @endif
        </div>
    </div>
@endsection
