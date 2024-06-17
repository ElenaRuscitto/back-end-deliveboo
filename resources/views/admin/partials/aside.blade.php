<div class="aside">

    <div class="row row-cols-1 my-5 mx-2">
        {{--TODO:DA FARE HOME --}}
        <div class="col mb-3 my-link">
            <a class="nav-link" href="{{ route('admin.restaurants.index')}}">Home</a>
        </div>
        <div class="col mb-3 my-link">
            <a class="nav-link" href="{{ route('admin.restaurants.index')}}">Il tuo Ristorante</a>
        </div>
        {{--! Debug Aggiunta ristorante --}}
        {{-- @if(Route::currentRouteName() !== 'admin.restaurants.index')
        <div class="col mb-3 my-link">
            <a class="nav-link" href="{{ route('admin.restaurants.create')}}">Aggiungi</a>
        </div>
        @endif --}}
        {{--! /Debug Aggiunta ristorante --}}

        @if (!empty($restaurant))

            {{--? Aggiunta piatto --}}
            <div class="col mb-3 my-link">
                <a class="nav-link" href="{{ route('admin.dishes.create', $restaurant)}}">Aggiungi piatto</a>
            </div>
            {{--? /Aggiunta piatto --}}
            {{--? Visualizzazione piatti --}}
            <div class="col mb-3 my-link">
                <a class="nav-link" href="{{ route('admin.restaurants.show', $restaurant->id) }}">Visualizza Piatti</a>
            </div>
            {{--? /Visualizzazione piatti --}}

        @endif
    </div>
</div>
