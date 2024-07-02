@extends('layouts.admin')
@section('content')

<div class="container-xl my-5">
    <h1>Aggiungi il tuo Ristorante</h1>
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
    <form onsubmit="return validateCheckboxes()" action="{{ route('admin.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mt-3">
            <label>Tipo ristorante (<span class="text-danger">*</span>)</label>
        </div>
        <div class="btn-group mt-1" role="group" aria-label="Basic checkbox toggle button group">
            <div class="flex-wrap d-flex align-content-center justify-content-center ">
                @foreach ($types as $type)
                <input name="types[]"type="checkbox" class="btn-check mx-1 my-" id="{{$type->name}}" autocomplete="off" value="{{$type->id}}" @if (
                    ($errors->any() && in_array($type->id, old('types', []))) )checked @endif >
                <label class="btn btn-outline-primary btn-sm" for="{{$type->name}}">{{$type->name}}</label>
                @endforeach
            </div>
        </div>
        <span class="invalid-feedback" role="alert" id="types-error" style="display:none;">
            <strong>Seleziona almeno una tipologia.</strong>
        </span>
        <div class="row row-cols-2 mt-5">
            {{--? Nome --}}
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome Del Ristorante (<span class="text-danger">*</span>)</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      name="name"
                      value="{{ old('name') }}"
                      placeholder="nome"
                      required
                      minlength="3"
                      maxlength="100"
                    >
                </div>
            </div>
            {{--? /Nome --}}
            {{--? Email --}}
            <div class="col">
                <div class="mb-3">
                    <label for="email" class="form-label">Indirizzo Email (<span class="text-danger">*</span>)</label>
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      placeholder="tuaemail@esempio.it"
                      value="{{ old('email') }}"
                      name="email"
                      placeholder="email"
                      required
                      minlength="3"
                      maxlength="255"
                    >
                </div>
            </div>
            {{--? /Email --}}
            {{--? Indirizzo --}}
            <div class="col">
                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo del ristorante (<span class="text-danger">*</span>)</label>
                    <input
                      type="text"
                      class="form-control"
                      id="address"
                      value="{{ old('address') }}"
                      placeholder="address"
                      name="address"
                      required
                      minlength="5"
                      maxlength="100"
                    >
                </div>
            </div>
            {{--? /Indirizzo --}}
            {{--? P.IVA --}}
            <div class="col">
                <div class="mb-3">
                    <label for="vat" class="form-label">P.IVA del Ristorante (<span class="text-danger">*</span>)</label>
                    <input
                      type="text"
                      class="form-control"
                      id="vat"
                      value="{{ old('vat') }}"
                      placeholder="P.Iva"
                      name="vat"
                      required
                      minlength="11"
                      maxlength="11"
                    >
                </div>
            </div>
            {{--? /P.Iva --}}
            {{--? Descrizione --}}
            <div class="col">
                <label for="desc" class="form-label">Descrizione</label>
                <textarea class="form-control col-11 mb-3" class=""
                          id="desc"
                          value="{{ old('desc') }}"
                          placeholder="desc"
                          name="desc"
                          minlength="5"
                          maxlength="500">
                </textarea>
            </div>
            {{--? /Descrizione --}}
            {{--? IMG --}}
            <div class="col">
                <div class="mb-3">
                    <label for="image" class="form-label">Inserisci un immagine per il tuo Ristorante</label>
                    <input
                      class="form-control"
                      type="file"
                      id="image"
                      value="{{ old('image') }}"
                      placeholder="Immagine"
                      name="image"
                      onchange="showImage(event)"
                    >
                    <img class=" w-25 mt-2" id="thumb" :src="{{ asset('storage/uploads/' ) }}"
                  >

                </div>
            </div>
            {{--? /IMG --}}
        </div>

        <div>
            <small class="text-danger">I campi contrassegnati con (*) sono obbligatori</small>
        </div>

        <div class="mt-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success me-3">Crea</button>
            <button type="reset" class="btn btn-outline-danger">Cancella</button>
        </div>
    </form>
</div>
<script>
    function validateCheckboxes() {
        const checkboxes = document.querySelectorAll('input[name="types[]"]');
        const isChecked = Array.prototype.slice.call(checkboxes).some(x => x.checked);
        const typesError = document.getElementById('types-error');
        if (!isChecked) {
            typesError.style.display = 'block';
            return false;
        }
        typesError.style.display = 'none';
        return true;
    }

    function showImage(event){
        const thumb = document.getElementById('thumb');
        thumb.src = URL.createObjectURL(event.target.files[0]);

    }
</script>
@endsection
