@extends('layouts.admin')

@section('main-content')
    <h1>Daftar Konser</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('concerts.create') }}" class="btn btn-primary mb-3">Tambah Konser</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Gambar</th>
                <th>Nama Konser</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Harga Tiket</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($concerts as $concert)
                <tr>
                    <td>{{ $concert->id }}</td>
                    <td><img src="{{ asset('storage/' . $concert->image) }}" alt="{{ $concert->concert_name }}" width="100"></td>
                    <td>{{ $concert->concert_name }}</td>
                    <td>{{ $concert->venue }}</td>
                    <td>{{ $concert->date }}</td>
                    <td>Rp {{ $concert->ticket_price }}</td>
                    <td>
                        <a href="{{ route('concerts.show', $concert->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('concerts.edit', $concert->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('concerts.destroy', $concert->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus konser ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
