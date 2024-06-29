@extends('layouts.admin')

@section('content')

<div class="container">

<h1 class="text-center">{{ $dish->name }}</h1>

<div class="d-flex justify-content-center mt-5">

    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Prezzo unitario: {{ number_format($dish->price,2, ',', '.')}} &euro;</li>
          <li class="list-group-item">Ingredienti: {{ $dish->desc }}</li>
          <li class="list-group-item">Visibilità:
              @if($dish->visibility)
              <i class="fa-solid fa-thumbs-up green"></i>
              @else
              <i class="fa-solid fa-thumbs-down red"></i>
              @endif
            </li>
            <li class="list-group-item">Vegetariano:
                @if($dish->vegan)
                <i class="fa-solid fa-leaf green"></i>
                @else
                <i class="fa-solid fa-xmark red"></i>
                @endif
            </li>
            <li class="list-group-item">Immagine:
                @if(!isset($dish->original_image))
                <i class="fa-solid fa-xmark red"></i>
                @else
                <i class="fa-solid fa-check green"></i>
                @endif
            </li>
        </ul>
      </div>
</div>
<p></p>
<p></p>
<p class="fw-normal mb-1">

</p>
<p class="fw-normal mb-1">

</p>
<td class="tab-img ">

</td>

</div>


@endsection
