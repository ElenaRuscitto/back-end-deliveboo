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
            <table class="table table-striped m-5">
                <thead>
                    <tr>
                        {{-- TODO: SE C'è IMMAGINE SI VEDE, ALTRIMENTO NO --}}
                        <th>Immagine</th>
                        <th>Nome Piatto</th>
                        <th>Prezzo</th>
                        <th>Ingredienti/Descrizione</th>
                        <th>Visibilità</th>
                        <th>Vegano</th>
                        <th class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myRestaurant->dishes as $dish)
                    <tr>
                        <td>
                            <img class="img-fluid w-25 mt-2" id="thumb" :src="{{ asset('storage/uploads/' . $dish->image) }} "
                            >
                            {{-- <img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2hgBGgFmVjv_hcAP3vcihsLyFMEQB-S8t2Q&s" alt=""> --}}
                        </td>
                        <td>{{ $dish->name }}</td>
                        <td>&euro; {{ number_format($dish->price, 2, ',', '.') }}</td>

                        <td>{{ $dish->desc }}</td>
                        <td>{{ $dish->visibility ? 'Visible' : 'Hidden' }}</td>
                        <td>{{ $dish->vegan ? 'Yes' : 'No' }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.dishes.edit', ['restaurant' => $myRestaurant, 'dish'=> $dish]) }}" class="btn btn-warning mx-1">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="{{ route('admin.dishes.destroy', ['restaurant' => $myRestaurant->id, 'dish'=> $dish->id])}}" method="POST" class="mx-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare il piatto?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

    </div>
@endsection



<script>

    function showImage(event){
        const thumb = document.getElementById('thumb');
        thumb.src = URL.createObjectURL(event.target.files[0]);

    }
</script>
