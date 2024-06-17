@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create Dish</h1>
        <form action="{{ route('admin.dishes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" id="desc" name="desc"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="visibility">Visibility</label>
                <select class="form-control" id="visibility" name="visibility" required>
                    <option value="1">Visible</option>
                    <option value="0">Hidden</option>
                </select>
            </div>
            <!--TOFIX: cambiare input -->
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="vegan">Vegan</label>
                <select class="form-control" id="vegan" name="vegan">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
