@extends('layouts.admin')

@section('main-content')
    <h1>Daftar Pembayaran</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('payments.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Tiket</th>
                <th>Jumlah</th>
                <th>Tanggal Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Kode Tiket</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->ticket_id }} ({{ $payment->ticket->concert->concert_name ?? 'N/A' }})</td>
                    <td>Rp {{ $payment->amount }}</td>
                    <td>{{ $payment->payment_date }}</td>
                    <td>{{ $payment->payment_status }}</td>
                    <td>{{ $payment->payment_code }}</td>
                    <td>
                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pembayaran ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
