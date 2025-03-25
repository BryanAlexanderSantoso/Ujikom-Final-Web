@extends('layouts.admin')

@section('main-content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Konser</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                @if ($concert->image)
                <img src="{{ asset('storage/' . $concert->image) }}" alt="{{ $concert->concert_name }}" class="img-fluid rounded mb-3">
                @else
                <p class="text-muted">Tidak ada gambar konser.</p>
                @endif
            </div>
            <div class="col-md-8">
                <dl class="row">
                    <dt class="col-sm-4">Nama Konser:</dt>
                    <dd class="col-sm-8">{{ $concert->concert_name }}</dd>

                    <dt class="col-sm-4">Tempat:</dt>
                    <dd class="col-sm-8">{{ $concert->venue }}</dd>

                    <dt class="col-sm-4">Tanggal:</dt>
                    <dd class="col-sm-8">{{ $concert->date }}</dd>

                    <dt class="col-sm-4">Harga Tiket:</dt>
                    <dd class="col-sm-8">Rp {{ number_format($concert->ticket_price, 0, ',', '.') }}</dd>
                </dl>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('concerts.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
