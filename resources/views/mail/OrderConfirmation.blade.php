@component('mail::message')

Gentile {{ $new_order->name }}, <br>

La ringraziamo per aver scelto il nostro servizio di delivery. Siamo lieti di confermare che il suo ordine presso {{ $restaurant->name }} è stato ricevuto e verrà elaborato al più presto. <br>

<strong>Dettagli dell'ordine:</strong>  <br>

Codice transazione: {{ $new_order->code }} <br>
Data dell'ordine: {{ $currentDate }} <br>
Indirizzo di consegna: {{ $new_order->address }} <br>


<strong>Prodotti ordinati:</strong>  <br>

@foreach ($dishes as $dish )
{{ $dish['dish']['name'] }} x {{ $dish['quantity'] }} - {{ number_format($dish['dish']['price'],2, ',', '.')}} &euro; <br>

@endforeach

<strong>Totale:</strong>  <br>
{{ number_format($new_order->tot,2, ',', '.')}} &euro; <br>



Grazie per la fiducia e buon appetito! <br>

Cordiali saluti, <br>
Team DeliveBoo <br>


<small>Questa è una email generata automaticamente, si prega di non rispondere.</small>

@endcomponent
