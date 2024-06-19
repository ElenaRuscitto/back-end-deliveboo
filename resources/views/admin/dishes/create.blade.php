@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- @dd($restaurant) --}}

        <h1>Crea Piatto</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form id="dish-form" action="{{ route('admin.dishes.store', $restaurant) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="name">Nome (*)</label>
                <input type="text" class="form-control" id="name" name="name" required minlength='3' maxlength='100' value="{{ old('name') }}">
            </div>
            <div class="form-group mt-3">
                <label for="desc">Descrizione</label>
                <textarea class="form-control" id="desc" name="desc">{{ old('desc') }}</textarea>
            </div>
            <div class="form-group mt-3">
                <label for="price">Prezzo (*)</label>
                <input id="price" type="number" class="form-control" name="price" step="0.01" required min="1.00" max="99.99" value="{{ old('price') }}">
            </div>
            <div class="form-group mt-3">
                <label for="visibility">Visibilità (*)</label>
                <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="visibility"
                      id="visibility"
                      value="1"
                      checked
                    >
                    <label class="form-check-label" for="flexRadioDefault1">
                      Si
                    </label>
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="visibility"
                      id="visibility"
                      value="0"
                    >
                    <label class="form-check-label" for="visibility">
                      No
                    </label>
                  </div>
            </div>
            <!--FIXME: cambiare input -->
            <div class="form-group mt-3">
                <label for="image">Immagine</label>
                <input type="file" class="form-control" id="image" name="image" onchange="showImage(event)">
                <img class=" w-25 mt-2" id="thumb" :src="{{ asset('storage/uploads/' . $restaurant->image) }}"
                  >
                  {{-- <small>{{ $dish->original_image }}</small> --}}
            </div>
            <div class="form-group mt-3">
                <label for="vegan">Vegano (*)</label>
                <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      checked
                      name="vegan"
                      id="vegan"
                      value="0"
                      checked
                    >
                    <label class="form-check-label" for="vegan">
                      No
                    </label>
                  </div>
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="vegan"
                      id="vegan"
                      value="1"
                    >
                    <label class="form-check-label" for="vegan">
                      Si
                    </label>
                  </div>

            </div>

            <div>
                <small>I campi contrassegnati con (*) sono obbligatori</small>
            </div>

            <button type="submit" class="btn btn-success mt-3">
                <i class="fa-solid fa-floppy-disk"></i>
            </button>
        </form>



    </div>


<script>
    document.getElementByID('dish-form').addEventListener('submit', function (event){

        // Prendo il valore del campo price
        let price = document.getElementById('price');
        let priceConverted = price.value;
        // Sostituisco la virgola con il punto
        priceConverted = priceConverted.replace(',', '.');
        // Aggiorniamo il prezzo
        price.value = priceConverted;
    });





    function showImage(event){
        const thumb = document.getElementById('thumb');
        thumb.src = URL.createObjectURL(event.target.files[0]);

    }
</script>


@endsection
