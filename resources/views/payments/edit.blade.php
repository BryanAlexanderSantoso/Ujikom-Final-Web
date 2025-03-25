@extends('layouts.admin')

@section('main-content')
    <h1>Edit Pembayaran</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="ticket_id" class="form-label">ID Tiket</label>
            <select class="form-control" id="ticket_id" name="ticket_id" required>
                <option value="">Pilih ID Tiket</option>
                @foreach ($tickets as $ticket)
                    <option value="{{ $ticket->id }}" {{ $payment->ticket_id == $ticket->id ? 'selected' : '' }}>ID: {{ $ticket->id }} ({{ $ticket->concert->concert_name ?? 'N/A' }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="payment_status" class="form-label">Status Pembayaran</label>
            <input type="text" class="form-control" id="payment_status" name="payment_status" value="{{ $payment->payment_status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
