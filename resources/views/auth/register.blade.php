@extends('layouts.verification')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-flex-start">
        <div class="col-md-6 pt-5 mg-left">
            <div class="card">
                <div class="card-header my-head-accedi" ><strong>{{ __('Registrati') }}</strong></div>

                <div class="card-body" >
                    <form id="registration-form" method="POST" action="{{ route('registrati') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }} (<span class="text-danger">*</span>)</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus minlength='3' maxlength='100'>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Cognome (<span class="text-danger">*</span>)</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus minlength='3' maxlength='100'>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }} (<span class="text-danger">*</span>)</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} (<span class="text-danger">*</span>)</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" minlength="8" maxlength="16">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }} (<span class="text-danger">*</span>)</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" minlength="8" maxlength="16">
                                <span class="invalid-feedback" role="alert" id="password-error" style="display:none;">
                                    <strong>Le password non coincidono.</strong>
                                </span>
                            </div>
                        </div>

                        {{-- ? Telephone --}}
                        <div class="mb-4 row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">Telefono</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}"  autocomplete="telephone" autofocus>

                                @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn my-btn">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>

                        <div>
                            <small class="text-danger">I campi contrassegnati con (*) sono obbligatori</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{--? Script verifica lunghezza password --}}
<script>
    document.getElementById('registration-form').addEventListener('submit', function(event) {
        // Prendo i valori dei campi password
        const password = document.getElementById('password').value;
        const passwordConfirm = document.getElementById('password-confirm').value;

        // Verifica che le password coincidano
        if (password !== passwordConfirm) {
            const passwordError = document.getElementById('password-error');
            passwordError.style.display = 'block';
            event.preventDefault(); // Blocca l'invio del form
            return false;
        }

        return true; // Permetti l'invio del form
    });
</script>
{{--? /Script verifica lunghezza password --}}

<style>
    .mg-left{
        margin-left: 5%
    }

    .my-head-accedi {
        background-color: rgb(232, 135, 53);
        border: 2px solid rgb(232, 135, 53);
        color: white;
    }

    .my-btn {
        background-color: rgb(232, 135, 53);
        color: white;

    }
    .my-btn:hover {
        background-color: rgba(232, 134, 53, 0.767);
        color: white;

    }
</style>
@endsection
