@extends('layouts.verification')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-flex-start">
        <div class="col-xs-12 col-md-8 col-xl-6 pt-5 mg-left">
            <div class="card">
                <div class="card-header my-head-accedi"><strong>{{ __('Accedi') }}</strong></div>

                <div class="card-body" style="border: solid 2px rgb(232, 135, 53); border-radius: 0!important">
                    <form method="POST" action="{{ route('accedi') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn my-btn">
                                    {{ __('Accedi') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Non ricordi la Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

    @media (max-width: 768px) {
        .mg-left{
        margin-left: 0%!important
    }
}

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
