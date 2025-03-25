@extends('layouts.admin')

@section('main-content')
    <h1>Tambah Tipe Kategori</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cat_types.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cat_type" class="form-label">Tipe Kategori</label>
            <input type="text" class="form-control" id="cat_type" name="cat_type" required>
        </div>
        <div class="mb-3">
            <label for="cat_description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="cat_description" name="cat_description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
