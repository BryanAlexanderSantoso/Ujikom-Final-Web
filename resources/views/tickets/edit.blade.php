@extends('layouts.admin')

@section('main-content')
    <h1>Edit Tiket</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="concert_id" class="form-label">Konser</label>
            <select class="form-control" id="concert_id" name="concert_id" required>
                <option value="">Pilih Konser</option>
                @foreach ($concerts as $concert)
                    <option value="{{ $concert->id }}" {{ $ticket->concert_id == $concert->id ? 'selected' : '' }}>{{ $concert->concert_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cat_id" class="form-label">Kategori</label>
            <select class="form-control" id="cat_id" name="cat_id" required>
                <option value="">Pilih Kategori</option>
                @foreach ($catTypes as $catType)
                    <option value="{{ $catType->id }}" {{ $ticket->cat_id == $catType->id ? 'selected' : '' }}>{{ $catType->cat_type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $ticket->quantity }}" min="1" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Konser</label>
            <input type="text" class="form-control" id="date" name="date" value="{{ $ticket->date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
