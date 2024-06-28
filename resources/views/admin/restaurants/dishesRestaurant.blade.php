@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- @dd($restaurant) --}}
        <div class=" my-3 box-content table-responsive-xxl w-100">

            @if (empty($myRestaurant->dishes))
            <p>Non ci sono piatti</p>
            <div class="text-center">
                <a href="{{ route('admin.dishes.create', $myRestaurant) }}" class="btn btn-primary">Aggiungi Piatto</a>
            </div>
            @else
            <div class="d-flex">
                <div class="text-center p-3">
                    <a href="{{ route('admin.dishes.create', $myRestaurant) }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i></a>

                </div>
                    <h1 class="text-center my-1">Il Tuo Menu</h1>


            </div>



            <div class="box-content table-responsive-md overflow-x-hidden w-100">

                <table class="table mb-0 bg-white table-sm table-hover w-100 text-center ">
                    <thead class="bg-light">
                    <tr>
                        <th class="text-start tab-img">Immagine</th>
                        <th class="hide d-md-table-cell tab-date">Nome</th>
                        <th class="hide d-md-table-cell tab-roi">Prezzo</th>
                        <th class="tab-state tab-desc">Ingredienti/Descrizione</th>
                        <th class="tab-state tab-vis">Visibilità</th>
                        <th class="tab-state tab-veg">Vegano</th>
                        <th class="tab-action">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- 1 -->
                    @foreach ($myRestaurant->dishes as $dish)
                    <tr class="">
                        <td class="tab-img ">
                            @if(!isset($dish->original_image))
                            <i class="fa-solid fa-xmark red"></i>
                            @else
                            <i class="fa-solid fa-check green"></i>
                            @endif
                        </td>
                        <td class="hide d-md-table-cell ">
                            <p class="fw-normal mb-1 text-center">{{ $dish->name }}</p>
                        </td>
                        <td class="hide d-md-table-cell">
                        <p class="fw-normal mb-1">
                            &euro;{{ number_format($dish->price, 2, ',', '.') }}
                        </p>
                        </td>
                        <td class="tab-desc">
                            <p class="">
                                {{ $dish->desc }}
                            </p>
                        </td>
                        <td class="tab-vis">
                            <p class="fw-normal mb-1">
                                @if($dish->visibility)
                                    <i class="fa-solid fa-thumbs-up green"></i>
                                @else
                                    <i class="fa-solid fa-thumbs-down red"></i>
                                @endif
                            </p>
                        </td>
                        <td class="tab-veg">
                            <p class="fw-normal mb-1">
                                @if($dish->vegan)
                                <i class="fa-solid fa-leaf green"></i>
                                @else
                                <i class="fa-solid fa-xmark red"></i>
                                @endif
                            </p>
                        </td>
                        <td class=" text-center ">
                            <div class="tab-actions">
                                {{-- Show --}}
                                <div class="my-1 mx-1">
                                    <a href="{{ route('admin.dishes.edit', ['restaurant' => $myRestaurant, 'dish'=> $dish]) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                                {{-- Show --}}
                                {{-- edit --}}
                                <div class="my-1">
                                    <a href="{{ route('admin.dishes.edit', ['restaurant' => $myRestaurant, 'dish'=> $dish]) }}" class="btn btn-warning">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </div>
                                {{-- edit --}}

                                {{-- Delete --}}
                                <div class="my-1">
                                    <form action="{{ route('admin.dishes.destroy', ['restaurant' => $myRestaurant->id, 'dish'=> $dish->id])}}" method="POST" class="mx-1">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare il piatto?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                </div>
                                {{-- /Delete --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <!-- /1 -->

                    </tbody>
                </table>
            </div>



            {{-- <table class="table table-striped m-5">
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
            </table> --}}
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
