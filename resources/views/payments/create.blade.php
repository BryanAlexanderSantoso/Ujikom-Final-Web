@extends('layouts.admin')

@section('main-content')
    <h1>Tambah Pembayaran</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('payments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="ticket_id" class="form-label">ID Tiket</label>
            <select class="form-control" id="ticket_id" name="ticket_id" required>
                <option value="">Pilih ID Tiket</option>
                @foreach ($tickets as $ticket)
                    <option value="{{ $ticket->id }}">ID: {{ $ticket->id }} ({{ $ticket->concert->concert_name ?? 'N/A' }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="payment_status" class="form-label">Status Pembayaran</label>
            <input type="text" class="form-control" id="payment_status" name="payment_status" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
