@extends('layouts.verification')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header my-head-forgot">{{ __('Resetta Password') }}</div>

                <div class="card-body" style="border: solid 2px rgb(232, 135, 53); border-radius: 0!important">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn my-btn">
                                    {{ __('Invia link di reset password') }}
                                </button>
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

    .my-head-forgot {
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
    input:focus{
  border-color:#e88735 !important;
  box-shadow: 0 0 0 0.25rem rgba(232, 135, 53, .4)
  !important;
}
.custom-checkbox:checked{
    background-color: #e88735;
}
input:-webkit-autofill {
      -webkit-box-shadow: 0 0 0 30px white inset !important;
      box-shadow: 0 0 0 30px white inset !important;
      -webkit-text-fill-color: black !important;
    }
</style>
@endsection
