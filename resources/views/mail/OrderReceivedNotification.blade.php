@component('mail::message')

Gentile Ristoratore, <br>

Siamo lieti di informarla che ha ricevuto un nuovo ordine tramite il nostro servizio di delivery. Di seguito, i dettagli dell'ordine: <br>

<strong>Dettagli dell'ordine:</strong> <br>

Codice transazione: {{ $new_order->code }} <br>
Data e ora dell'ordine: {{ $currentDateTime }} <br>
Destinatario: {{ $new_order->name }} <br>
Indirizzo di consegna: {{ $new_order->address }} <br>

<strong>Prodotti ordinati:</strong> <br>

@foreach ($dishes as $dish )

{{ $dish['dish']['name'] }} x {{ $dish['quantity'] }} - {{ number_format($dish['dish']['price'],2, ',', '.')}} &euro; <br>

@endforeach

<strong>Totale:</strong>  <br>
{{ number_format($new_order->tot,2, ',', '.')}} &euro; <br>

Un nostro rider raggiungerà presto il suo ristorante. <br>

Grazie per la collaborazione e buon lavoro! <br>

Cordiali saluti, <br>
Team DeliveBoo <br>

<small>Questa è una email generata automaticamente, si prega di non rispondere.</small> <br>

@endcomponent

