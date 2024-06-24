@extends('layouts.admin')

@section('content')
<div class="container h-100 d-flex flex-column align-items-center justify-content-center " >

    <h1>Dettagli ordine N {{ $order->id }}</h1>
    <p>Nome {{ $order->name }}</p>
    <p>Indirizzo di consegna {{ $order->address }}</p>
    <p>Email {{ $order->email }}</p>
    <p>Numero di telefono {{ $order->telephone }}</p>
    <p>Note {{ $order->desc }}</p>
    <p>Data Ordine {{ $order->created_at }}</p>
    <p>Tot pagato {{ $order->tot }}</p>

    <h2>I piatti ordinati</h2>
    @foreach ($dishes as $dish )
    <div>
        <div> Nome: {{ $dish->name}}</div>
        <div>Desc: {{ $dish->desc}}</div>
        <div>Prezzo: {{ $dish->price}}</div>
    </div>
    @endforeach
</div>
