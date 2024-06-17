@extends('layouts.admin')

@section('content')
    <div class="container">

        {{-- <h4 class="my-5">Ciao {{ $user->name }} {{ $user->surname }} </h4> --}}
        <p class="mb-5">
            Queste solo le informazioni sul tuo Ristorante
        </p>
        <div class="card">
            <div class="card-header">
                {{-- @dd($restaurant) --}}
                {{ $restaurant->name }}
            </div>
            <div class="card-body">
                <p>Nome: {{ $restaurant->name }}</p>
                <p>Email: {{ $restaurant->email }}</p>
                <p>Indirizzo: {{ $restaurant->address }}</p>
                <p>P.IVA: {{ $restaurant->vat }}</p>

            </div>
        </div>

        <div class="d-flex justify-content-center my-3">
            <h2>Piatti</h2>
            <div class="">
                {{-- @dd($restaurant) --}}
                <a href="{{ route('admin.dishes.create', $restaurant) }}" class="btn btn-primary">Aggiungi Piatto</a>
            </div>
            @if (empty($restaurant->dishes))
                <p>Non ci sono piatti</p>
            @else
                <ul>
                    @foreach ($restaurant->dishes as $dish)
                        <li>
                            <p>{{ $dish->name }}</p>
                            <p>{{ $dish->desc }}</p>
                            <p>{{ $dish->price }}</p>
                            <p>{{ $dish->visibility ? 'Visible' : 'Hidden' }}</p>
                            <p>{{ $dish->vegan ? 'Yes' : 'No' }}</p>
                            <p> {{$dish->image}}</p>

                            <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

    </div>
@endsection
