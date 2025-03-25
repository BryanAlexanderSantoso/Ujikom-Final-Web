@extends('layouts.admin')

@section('main-content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Pembayaran</h6>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-4">ID Pembayaran:</dt>
            <dd class="col-sm-8">{{ $payment->id }}</dd>

            <dt class="col-sm-4">ID Tiket:</dt>
            <dd class="col-sm-8">
                {{ $payment->ticket_id }}
                @if ($payment->ticket && $payment->ticket->concert)
                    ({{ $payment->ticket->concert->concert_name }})
                @else
                    (N/A)
                @endif
            </dd>

            <dt class="col-sm-4">Jumlah:</dt>
            <dd class="col-sm-8">{{ $payment->amount }}</dd>

            <dt class="col-sm-4">Tanggal Pembayaran:</dt>
            <dd class="col-sm-8">{{ $payment->payment_date }}</dd>

            <dt class="col-sm-4">Status Pembayaran:</dt>
            <dd class="col-sm-8">{{ $payment->payment_status }}</dd>
        </dl>
        <div class="mt-3">
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
