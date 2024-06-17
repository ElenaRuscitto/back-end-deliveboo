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

    <form action="{{ route('admin.dishes.update', ['restaurant' => $restaurant, 'dish'=> $dish]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group ">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $dish->name) }}" required>
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
            <label for="price">Prezzo:</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $dish->price) }}" required>
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
            <input type="text" name="image" id="image" class="form-control" value="{{ old('image', $dish->image) }}">
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

        <button type="submit" class="btn btn-success mt-3">
            <i class="fa-solid fa-floppy-disk"></i>
        </button>
    </form>
</div>

<!--

<script>
    $(document).ready(function() {
        $("form").validate({
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
