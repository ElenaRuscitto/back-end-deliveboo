@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- @dd($restaurant) --}}
        <div class=" my-3 box-content table-responsive-xxl w-100">

            <div class="text-center">
                <a href="{{ route('admin.dishes.create', $myRestaurant) }}" class="btn btn-primary">Aggiungi Piatto</a>
            </div>
            @if (empty($myRestaurant->dishes))
                <p>Non ci sono piatti</p>
            @else
            <table class="table table-striped m-5">
                <thead>
                    <tr>
                        <th class="text-center">Immagine</th>
                        <th class="text-center">Nome Piatto</th>
                        <th class="text-center">Prezzo</th>
                        <th class="ps-3">Ingredienti/Descrizione</th>
                        <th class="text-center">Visibilità</th>
                        <th class="text-center">Vegano</th>
                        <th class="ps-4 text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myRestaurant->dishes as $dish)
                    <tr>
                        <td class="pt-4  text-center">

                            @if(!isset($dish->original_image))
                                <i class="fa-solid fa-xmark red"></i>
                            @else
                                <i class="fa-solid fa-check green"></i>
                            @endif

                        </td>
                        <td class="pt-4 w-auto text-center">{{ $dish->name }}</td>
                        <td class="pt-4 w-auto text-center">&euro;{{ number_format($dish->price, 2, ',', '.') }}</td>

                        <td class="pt-4 ps-3 w-auto">{{ $dish->desc }}</td>
                        <td class="pt-4 w-auto text-center">
                            @if($dish->visibility)
                                <i class="fa-solid fa-thumbs-up green"></i>
                            @else
                                <i class="fa-solid fa-thumbs-down red"></i>
                            @endif
                        </td>
                        <td class="pt-4 w-auto text-center">
                            @if($dish->vegan)
                            <i class="fa-solid fa-leaf green"></i>
                        @else
                            <i class="fa-solid fa-xmark red"></i>
                        @endif
                        </td>
                        <td class="pt-4 text-center">
                            <div class="d-flex ms-4">
                                <div>
                                    <a href="{{ route('admin.dishes.edit', ['restaurant' => $myRestaurant, 'dish'=> $dish]) }}" class="btn btn-warning mx-1">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>

                                </div>
                                <div>
                                    <form action="{{ route('admin.dishes.destroy', ['restaurant' => $myRestaurant->id, 'dish'=> $dish->id])}}" method="POST" class="mx-1">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare il piatto?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
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
