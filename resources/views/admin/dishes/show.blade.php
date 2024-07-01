@extends('layouts.admin')

@section('content')

<div class="container">

    <h1 class="text-center">{{ $dish->name }}</h1>
    <div class="row row-cols-1 row-cols-md-2 justify-content-center">
        <div class="col thumb mt-5">
            @if(!isset($dish->image))
                <div>
                    <p class="text-center fw-bold">Non è stata caricata nessun immagine!</p>
                </div>
            @else
                <div>
                    <img class="mt-2" src="{{ asset('storage/' . $dish->image) }}">
                </div>
            @endif
        </div>

        <div class="col mt-5 margin ">

            <div>
                <ul class="list-group list-group-flush text-center text-md-start">
                    <li class="style"><strong>Prezzo:</strong> {{ number_format($dish->price,2, ',', '.')}} &euro;</li>
                    <li class="style"><strong>Ingredienti:</strong> {{ $dish->desc }}</li>
                    <li class="style"><strong>Visibilità:</strong>
                        @if($dish->visibility)
                        <i class="fa-solid fa-thumbs-up green"></i>
                        @else
                        <i class="fa-solid fa-thumbs-down red"></i>
                        @endif
                    </li>
                    <li class="style"><strong>Vegetariano:</strong>
                        @if($dish->vegan)
                        <i class="fa-solid fa-leaf green"></i>
                        @else
                        <i class="fa-solid fa-xmark red"></i>
                        @endif
                    </li>

                </ul>
            </div>

        </div>


        </div>
</div>


<style >
    .thumb {

        width: 300px;
         margin: 0 auto;
        /* object-fit: cover; */
    }

    .style {
        list-style: none;
        margin: 5px 15px;
    }

    .margin {
        margin: 0 auto;
    }
</style>

@endsection
