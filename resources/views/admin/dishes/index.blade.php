@extends('layouts.admin')

@section('content')
    <div class="container">
        <div>
            <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">Aggiungi Piatto</a>
        </div>
        <div>
            <h1 class="my-5">Piatti cicci</h1>
            <table class="table mt-3">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Visibility</th>
                        <th>Vegan</th>
                        <th></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dishes as $dish)
                        <tr>
                            <td>{{ $dish->name }}</td>
                            <td>{{ $dish->desc }}</td>
                            <td>{{ $dish->price }}</td>
                            <td>{{ $dish->visibility ? 'Visible' : 'Hidden' }}</td>
                            <td>{{ $dish->vegan ? 'Yes' : 'No' }}</td>
                            <td> {{$dish->image}}</td>
                            <td>
                                <a href="{{ route('admin.dishes.show', $dish->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
