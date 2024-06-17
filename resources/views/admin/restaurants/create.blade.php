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
                      value="name"
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
                      value="email"
                      name="email"
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
                      value="address"
                      name="address"
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
                      value="vat"
                      name="vat"
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
                      value="image"
                      name="image"
                    >
                </div>
            </div>
            {{--? /IMG --}}
        </div>

        <div class="mt-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success me-3">Crea</button>
            <button type="reset" class="btn btn-outline-danger">Cancella</button>
        </div>
    </form>
</div>

@endsection
