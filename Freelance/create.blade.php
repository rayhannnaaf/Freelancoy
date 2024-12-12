@extends('layouts.app')

@section('content')
    <h1>Tambah Kategori Baru</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="categories">Nama Kategori</label>
            <input type="text" class="form-control" id="categories" name="categories" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection

