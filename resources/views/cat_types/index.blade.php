@extends('layouts.admin')

@section('main-content')
    <h1>Daftar Tipe Kategori</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('cat_types.create') }}" class="btn btn-primary mb-3">Tambah Tipe Kategori</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipe Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($catTypes as $catType)
                <tr>
                    <td>{{ $catType->id }}</td>
                    <td>{{ $catType->cat_type }}</td>
                    <td>{{ $catType->cat_description }}</td>
                    <td>
                        <a href="{{ route('cat_types.show', $catType->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('cat_types.edit', $catType->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('cat_types.destroy', $catType->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tipe kategori ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
