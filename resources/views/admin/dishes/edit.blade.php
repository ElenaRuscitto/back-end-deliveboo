@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="my-5">Modifica Piatto {{$dish->name}}</h1>
    {{-- @dd($dish) --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form id="dish-form" action="{{ route('admin.dishes.update', ['restaurant' => $restaurant, 'dish'=> $dish]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group ">
            <label for="name">Nome: (*)</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $dish->name) }}" required minlength='3' maxlength='100'>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group pt-3">
            <label for="desc">Descrizione:</label>
            <textarea name="desc" id="desc" class="form-control">{{ old('desc', $dish->desc) }}</textarea>
            @error('desc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group pt-3">
            <label for="price">Prezzo: (*)</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $dish->price) }}" step="0.01" required min="1.00" max="99.99">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group pt-3">
            <label for="visibility">Visibilità:</label>
            <select name="visibility" id="visibility" class="form-control" required>
                <option value="1" {{ old('visibility', $dish->visibility) ? 'selected' : '' }}>Visible</option>
                <option value="0" {{ old('visibility', $dish->visibility) ? '' : 'selected' }}>Hidden</option>
            </select>
            @error('visibility')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group pt-3">
            <label for="image">Immagine:</label>
            <input type="file" name="image" id="image" class="form-control" onchange="showImage(event)">
            <img class=" w-25 mt-2" id="thumb" :src="{{ asset('storage/uploads/' . $restaurant->image) }}"
                  >
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group pt-3">
            <label for="vegan">Vegano:</label>
            <select name="vegan" id="vegan" class="form-control">
                <option value="1" {{ old('vegan', $dish->vegan) ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('vegan', $dish->vegan) ? '' : 'selected' }}>No</option>
            </select>
            @error('vegan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
