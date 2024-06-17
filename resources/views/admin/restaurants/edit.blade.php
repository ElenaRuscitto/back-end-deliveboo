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
    <form action="{{ route('admin.restaurants.update', $restaurant)}}" method="POST">
        @csrf
        @method('PUT')
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
                      value="{{ $restaurant->name }}"
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
                      value="{{ $restaurant->email }}"
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
                      value="{{ $restaurant->address }}"
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
                      value="{{ $restaurant->vat }}"
                      name="P.Iva"
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
                      value="{{ $restaurant->image }}"
                      name="image"
                    >
                </div>
            </div>
            {{--? /IMG --}}
        </div>

        <div class="mt-3 d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success me-3">Modifica</button>
            <button type="reset" class="btn btn-outline-danger">Cancella</button>
        </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("form").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 100
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 255
                },
                address: {
                    required: true,
                    minlength:5,
                    maxlength: 100
                },
                vat: {
                    required: true,
                    minlength: 11,
                    maxlength: 11
                },
                image: {
                    required: false,
                    maxlength: 255
                    //filesize: 2048000 // 2MB in bytes
                }
            },
            messages: {
                name: {
                    required: "Il nome è obbligatorio",
                    maxlength: "Il nome non può superare i 100 caratteri"
                },
                email: {
                    required: "L'email è obbligatoria",
                    email: "Inserisci un'email valida",
                    maxlength: "L'email non può superare i 255 caratteri"
                },
                address: {
                    required: "L'indirizzo è obbligatorio",
                    maxlength: "L'indirizzo non può superare i 100 caratteri"
                },
                vat: {
                    required: "La P.IVA è obbligatoria",
                    maxlength: "La P.IVA non può superare gli 11 caratteri"
                },
               /* image: {
                    extension: "Il file deve essere un'immagine (jpg, jpeg, png)",
                    //filesize: "L'immagine non può superare i 2MB"
                } */
            }
        });


    });
</script>

@endsection
