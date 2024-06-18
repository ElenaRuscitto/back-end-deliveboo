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

        <form action="{{ route('admin.dishes.store', $restaurant) }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required minlength='3' maxlength='100'>
            </div>
            <div class="form-group mt-3">
                <label for="desc">Descrizione</label>
                <textarea class="form-control" id="desc" name="desc"></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="price">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required min="1.00" max="99.99">
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
                    >
                    <label class="form-check-label" for="visibility">
                      No
                    </label>
                  </div>
            </div>
            <!--FIXME: cambiare input -->
            <div class="form-group mt-3">
                <label for="image">Immagine</label>
                <input type="text" class="form-control" id="image" name="image" maxlength="100">
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
            <button type="submit" class="btn btn-success mt-3">
                <i class="fa-solid fa-floppy-disk"></i>
            </button>
        </form>
    </div>

    <!--
<script>
    $(document).ready(function() {
        $('#form-dishes').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 100
                },
                desc: {
                    required: false,
                    maxlength: 255
                },
                price: {
                    required: true,
                    number: true,
                    min: 0.01,
                    max: 999.99
                },
                visibility: {
                    required: true,
                },
                image: {
                    required: false,
                    maxlength: 100
                },
                vegan: {
                    required: false,
                }
            },
            messages: {
                name: {
                    required: "Il nome è obbligatorio",
                    maxlength: "Il nome non può superare i 100 caratteri"
                },
                desc: {
                    maxlength: "La descrizione non può superare i 255 caratteri"
                },
                price: {
                    required: "Il prezzo è obbligatorio",
                    max: "Il prezzo non può superare 999,99",
                    min: "Il prezzo non può essere nullo"
                },
                visibility: {
                    required: "La visibilità è obbligatoria",
                },
                image: {
                    maxlength: "La lunghezza massima del nome del file è di 100 caratteri",
                    /*filesize: "L'immagine non può superare i 2MB"
                    extension: "Il file deve essere un'immagine (jpg, jpeg, png)"
                } */
                }
            }
        });

    });
</script> -->

@endsection
