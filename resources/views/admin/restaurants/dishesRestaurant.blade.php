@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- @dd($restaurant) --}}
        <div class=" my-3">

            <div class="text-center">
                <a href="{{ route('admin.dishes.create', $myRestaurant) }}" class="btn btn-primary">Aggiungi Piatto</a>
            </div>
            @if (empty($myRestaurant->dishes))
                <p>Non ci sono piatti</p>
            @else
            <div class="d-flex justify-content-evenly flex-wrap m-5">
                @foreach ($myRestaurant->dishes as $dish)
                <div class="card text-center my-card m-2" style="width: 18rem;">
                    <img src="{{$dish->image}}" class="card-img-top my-image" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"> <span class="strong">Nome Piatto: </span>{{ $dish->name }}</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary"><span class="strong">Prezzo: &euro; </span>{{ number_format($dish->price, 2, ',', '.') }}</h6>
                      <p class="card-text"><span class="strong">Ingredienti/Descrizione: </span>{{ $dish->desc }}</p>
                      <p class="card-text"><span class="strong">Visibilità: </span>{{ $dish->visibility ? 'Visible' : 'Hidden' }}</p>
                      <p class="card-text"><span class="strong">Vegano: </span>{{ $dish->vegan ? 'Yes' : 'No' }}</p>

                      <div class="d-flex justify-content-center">
                        <a href="{{ route('admin.dishes.edit', ['restaurant' => $myRestaurant, 'dish'=> $dish]) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                        <form
                          action="{{ route('admin.dishes.destroy', ['restaurant' => $myRestaurant->id, 'dish'=> $dish->id])}}"
                          method="POST"
                          class="mx-2"
                        >
                            @csrf
                            @method('DELETE')
                            <button
                              type="submit"
                              class="btn btn-danger"
                              onclick="return confirm('Sei sicuro di voler eliminare il piatto?')"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                      </div>

                    </div>



                        {{-- <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a> --}}
                        {{-- <a href="{{ route('admin.dishes.destroy', $dish) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> --}}

                </div>

                @endforeach
            </div>

            @endif
        </div>

    </div>
@endsection
