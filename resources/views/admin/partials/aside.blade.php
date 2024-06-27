<div class="aside">

    <div class="row row-cols-1 my-5 mx-2">
        {{--TODO:DA FARE HOME --}}
        <div class="col mb-3 my-link">

            <a class="nav-link" href="{{ route('admin.home')}}">Home</a>
        </div>
        <div class="col mb-3 my-link">
            <a class="nav-link" href="{{ route('admin.show')}}">Il tuo Menu</a>
        </div>
        {{--! Debug Aggiunta ristorante --}}
        {{-- @if(Route::currentRouteName() !== 'admin.restaurants.index')

        <div class="col mb-3 my-link">
            <a class="nav-link" href="{{ route('admin.restaurants.create')}}">Aggiungi</a>
        </div>
        @endif --}}
        {{--! /Debug Aggiunta ristorante --}}
        @if (isset($restaurant) && !empty($restaurant))

        {{--? Aggiunta piatto --}}
        <div class="col mb-3 my-link">
            <a class="nav-link" href="{{ route('admin.dishes.create', $restaurant)}}">Aggiungi piatto</a>
        </div>
        {{--? /Aggiunta piatto --}}
        @endif

        <div class="col mb-3 my-link">
            <a class="nav-link" href="{{ route('admin.orders.index')}}">Ordini</a>
        </div>

        <div class="col mb-3 my-link">
            <a class="nav-link" href="{{ route('admin.chart.index')}}">Statistiche</a>
        </div>

    </div>
</div>
