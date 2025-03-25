@extends('layouts.admin')

@section('main-content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Tiket</h6>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-4">Konser:</dt>
            <dd class="col-sm-8">{{ $ticket->concert->concert_name }}</dd>

            <dt class="col-sm-4">Kategori:</dt>
            <dd class="col-sm-8">{{ $ticket->category->cat_type }}</dd>

            <dt class="col-sm-4">Jumlah:</dt>
            <dd class="col-sm-8">{{ $ticket->quantity }}</dd>

            <dt class="col-sm-4">Tanggal Konser:</dt>
            <dd class="col-sm-8">{{ $ticket->date }}</dd>
        </dl>
        <div class="mt-3">
            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
