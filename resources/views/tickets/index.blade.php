@extends('layouts.admin')

@section('main-content')
    <h1>Daftar Tiket</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">Tambah Tiket</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Konser</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Tanggal Konser</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->concert->concert_name }}</td>
                    <td>{{ $ticket->category->cat_type }}</td>
                    <td>{{ $ticket->quantity }}</td>
                    <td>{{ $ticket->date }}</td>
                    <td>
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
