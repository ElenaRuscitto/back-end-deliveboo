@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- @dd($restaurant) --}}
        <h1>Crea Piatto</h1>
        <form action="{{ route('admin.dishes.store', $restaurant) }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group mt-3">
                <label for="desc">Descrizione</label>
                <textarea class="form-control" id="desc" name="desc"></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="price">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group mt-3">
                <label for="visibility">Visibilità</label>
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
                      checked
                    >
                    <label class="form-check-label" for="visibility">
                      No
                    </label>
                  </div>
            </div>
            <!--FIXME: cambiare input -->
            <div class="form-group mt-3">
                <label for="image">Immagine</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <div class="form-group mt-3">
                <label for="vegan">Vegano</label>
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
            <button type="submit" class="btn btn-primary mt-3">Salva</button>
        </form>
    </div>
@endsection
