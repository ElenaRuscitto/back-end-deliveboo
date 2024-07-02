<div class="aside">

    <div class="row row-cols-1 my-5 mx-2">
        {{--TODO:DA FARE HOME --}}
        <div class="col mb-3 ">

            <a class="nav-link d-flex justfy-content-center my-link" href="{{ route('admin.home')}}">
                <i class="fa-solid fa-house me-md-2 pt-1"></i>
                <span class="d-none d-xl-block">Home</span>
            </a>
        </div>
        <div class="col mb-3 ">
            <a class="nav-link d-flex justfy-content-center my-link" href="{{ route('admin.show')}}">
                <i class="fa-solid fa-book-open me-md-2 pt-1"></i>
                <span class="d-none d-xl-block">Il tuo Menu</span>
            </a>
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
        <div class="col mb-3 ">
            <a class="nav-link d-flex justfy-content-center my-link" href="{{ route('admin.dishes.create', $restaurant)}}">
                <i class="fa-solid fa-utensils me-md-2 pt-1"></i>
                <span class="d-none d-md-block">Aggiungi piatto</span>
            </a>
        </div>

       {{--? /Aggiunta piatto --}}        @endif

        <div class="col mb-3 ">
            <a class="nav-link d-flex justfy-content-center my-link " href="{{ route('admin.orders.index')}}">
                <i class="fa-solid fa-receipt me-md-2 pt-1"></i>
                <span class="d-none d-xl-block">Ordini</span>
            </a>
        </div>

        <div class="col mb-3 ">
            <a class="nav-link d-flex justfy-content-center my-link" href="{{ route('admin.chart.index')}}">
                <i class="fa-solid fa-chart-line me-md-2 pt-1"></i>
                <span class="d-none d-xl-block">Statistiche</span>
            </a>
        </div>

    </div>
</div>
