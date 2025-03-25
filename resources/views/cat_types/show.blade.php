@extends('layouts.admin')

@section('main-content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Tipe Kategori</h6>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-4">Tipe Kategori:</dt>
            <dd class="col-sm-8">{{ $catType->cat_type }}</dd>

            <dt class="col-sm-4">Deskripsi:</dt>
            <dd class="col-sm-8">{{ $catType->cat_description }}</dd>
        </dl>
        <div class="mt-3">
            <a href="{{ route('cat_types.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
