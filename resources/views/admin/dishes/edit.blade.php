@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Dish</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.dishes.update', $dish) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $dish->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" class="form-control">{{ old('desc', $dish->desc) }}</textarea>
            @error('desc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $dish->price) }}" required>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="visibility">Visibility</label>
            <select name="visibility" id="visibility" class="form-control" required>
                <option value="1" {{ old('visibility', $dish->visibility) ? 'selected' : '' }}>Visible</option>
                <option value="0" {{ old('visibility', $dish->visibility) ? '' : 'selected' }}>Hidden</option>
            </select>
            @error('visibility')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" id="image" class="form-control" value="{{ old('image', $dish->image) }}">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="vegan">Vegan</label>
            <select name="vegan" id="vegan" class="form-control">
                <option value="1" {{ old('vegan', $dish->vegan) ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('vegan', $dish->vegan) ? '' : 'selected' }}>No</option>
            </select>
            @error('vegan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
