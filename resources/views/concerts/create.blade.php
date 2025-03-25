@extends('layouts.admin')

@section('main-content')
    <h1>Tambah Konser</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('concerts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="concert_name" class="form-label">Nama Konser</label>
            <input type="text" class="form-control" id="concert_name" name="concert_name" required>
        </div>
        <div class="mb-3">
            <label for="venue" class="form-label">Tempat</label>
            <input type="text" class="form-control" id="venue" name="venue" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="text" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="ticket_price" class="form-label">Harga Tiket</label>
            <input type="number" class="form-control" id="ticket_price" name="ticket_price" min="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
