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
    <form action="{{ route('admin.restaurants.store')}}" method="POST">
        @csrf

        <div class="row row-cols-2 mt-5">
            {{--? Nome --}}
            <div class="col">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome Del Ristorante (*)</label>
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
                    <label for="email" class="form-label">Indirizzo Email (*)</label>
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
                    <label for="address" class="form-label">Indirizzo del ristorante (*)</label>
                    <input
                      type="address"
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
                    <label for="vat" class="form-label">P.IVA del Ristorante (*)</label>
                    <input
                      type="vat"
                      class="form-control"
                      id="vat"
                      value="{{ old('vat') }}"
                      placeholder="P.Iva"
                      name="vat"
                      required
                      min="11"
                      max="11"
                    >
                </div>
            </div>
            {{--? /P.Iva --}}
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
                    >
                </div>
            </div>
            {{--? /IMG --}}
        </div>

        <div>
            <small>I campi contrassegnati con (*) sono obbligatori</small>
        </div>

        <div class="mt-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success me-3">Crea</button>
            <button type="reset" class="btn btn-outline-danger">Cancella</button>
        </div>
    </form>
</div>



<!--
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
-->


@endsection
