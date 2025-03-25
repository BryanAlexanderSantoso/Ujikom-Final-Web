@extends('layouts.admin')

@section('main-content')
    <h1>Edit Konser</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('concerts.update', $concert->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($concert->image)
                <img src="{{ asset('storage/' . $concert->image) }}" alt="{{ $concert->concert_name }}" width="100" class="mt-2">
            @endif
        </div>
        <div class="mb-3">
            <label for="concert_name" class="form-label">Nama Konser</label>
            <input type="text" class="form-control" id="concert_name" name="concert_name" value="{{ $concert->concert_name }}" required>
        </div>
        <div class="mb-3">
            <label for="venue" class="form-label">Tempat</label>
            <input type="text" class="form-control" id="venue" name="venue" value="{{ $concert->venue }}" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="text" class="form-control" id="date" name="date" value="{{ $concert->date }}" required>
        </div>
        <div class="mb-3">
            <label for="ticket_price" class="form-label">Harga Tiket</label>
            <input type="number" class="form-control" id="ticket_price" name="ticket_price" value="{{ $concert->ticket_price }}" min="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
