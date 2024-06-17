@extends('layouts.admin')

@section('content')
    <div class="container">
        <h4 class="my-5">Ciao {{ $user->name }} {{ $user->surname }} </h4>
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
            {{-- <div class="btn btn-warning me-2 ">
                <a href="{{ route('admin.restaurants.edit', $restaurant) }}"><i class="fa-solid fa-pencil"></i></a>

            </div> --}}
            {{-- <div class="btn btn-danger">
                <a href="{{ route('admin.restaurants.destroy') }}"><i class="fa-solid fa-trash"></i></a>

            </div> --}}
        </div>

    </div>
@endsection
