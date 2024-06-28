@extends('layouts.verification')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica la tua E-mail') }}</div>

                <div class="card-body" style="border: solid 2px rgb(232, 135, 53); border-radius: 0!important">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('Prima di procedere, controlla la tua E-mail per il codice di verifica.') }}
                    {{ __('Se non hai ricevuto la mail,') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clicca qui per reinviarla.') }}</button>.
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
</style>
@endsection
