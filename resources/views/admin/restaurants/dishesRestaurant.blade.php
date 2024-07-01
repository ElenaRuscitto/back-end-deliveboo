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
            <div class="d-flex justify-content-between">
                <h1 class="text-center my-1">Il Tuo Menu</h1>
                <div class="text-center p-3">
                    <a href="{{ route('admin.dishes.create', $myRestaurant) }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i></a>

                </div>


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
                        <td class="tab-img pt-4">
                            @if(!isset($dish->original_image))
                            <i class="fa-solid fa-xmark red"></i>
                            @else
                            <i class="fa-solid fa-check green"></i>
                            @endif
                        </td>
                        <td class="hide d-md-table-cell pt-4">
                            <p class="fw-normal mb-1 text-center">{{ $dish->name }}</p>
                        </td>
                        <td class="hide d-md-table-cell pt-4">
                        <p class="fw-normal mb-1">
                            &euro;{{ number_format($dish->price, 2, ',', '.') }}
                        </p>
                        </td>
                        <td class="tab-desc pt-4">
                            <p class="">
                                {{ $dish->desc }}
                            </p>
                        </td>
                        <td class="tab-vis pt-4">
                            <p class="fw-normal mb-1">
                                @if($dish->visibility)
                                    <i class="fa-solid fa-thumbs-up green"></i>
                                @else
                                    <i class="fa-solid fa-thumbs-down red"></i>
                                @endif
                            </p>
                        </td>
                        <td class="tab-veg pt-4">
                            <p class="fw-normal mb-1">
                                @if($dish->vegan)
                                <i class="fa-solid fa-leaf green"></i>
                                @else
                                <i class="fa-solid fa-xmark red"></i>
                                @endif
                            </p>
                        </td>
                        <td class=" text-center pt-1">
                            <div class="tab-actions ">
                                {{-- Show --}}
                                <div class="mx-2">
                                    <a href="{{ route('admin.dishes.show', ['restaurant' => $myRestaurant, 'dish'=> $dish]) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                                {{-- Show --}}
                                {{-- edit --}}
                                <div class="">
                                    <a href="{{ route('admin.dishes.edit', ['restaurant' => $myRestaurant, 'dish'=> $dish]) }}" class="btn btn-warning">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                </div>
                                {{-- edit --}}

                                {{-- Delete --}}
                                <div class="mx-2 pt-3">
                                    <form action="{{ route('admin.dishes.destroy',  $dish)}}" method="POST" class="">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare il piatto?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
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
