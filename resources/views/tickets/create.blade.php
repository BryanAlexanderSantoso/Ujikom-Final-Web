@extends('layouts.admin')

@section('main-content')
    <h1>Tambah Tiket</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="concert_id" class="form-label">Konser</label>
            <select class="form-control" id="concert_id" name="concert_id" required>
                <option value="">Pilih Konser</option>
                @foreach ($concerts as $concert)
                    <option value="{{ $concert->id }}">{{ $concert->concert_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cat_id" class="form-label">Kategori</label>
            <select class="form-control" id="cat_id" name="cat_id" required>
                <option value="">Pilih Kategori</option>
                @foreach ($catTypes as $catType)
                    <option value="{{ $catType->id }}">{{ $catType->cat_type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Konser</label>
            <input type="text" class="form-control" id="date" name="date" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
