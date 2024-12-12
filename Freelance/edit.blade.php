@extends('layouts.app')

@section('content')
    <h1>Edit Kategori</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="categories">Nama Kategori</label>
            <input type="text" class="form-control" id="categories" name="categories" value="{{ $category->categories }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" required>{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection

