@extends('admin.layout.app')

@section('heading', 'Kas Masjid')

@section('button')
<a href="{{ route('admin_kas_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Informasi Kas</a>
@endsection

@section('main_content')
<div class="d-flex">
    <div class="card">
        <div class="card-body">
            <h6>Kas Saat Ini</h6>
            {{ $total }}
        </div>
    </div>
    <div class="card" style="margin-left: 1rem;">
        <div class="card-body">
            <h6>Total Pemasukan</h6>
            {{ $total_pemasukan }}
        </div>
    </div>
    <div class="card" style="margin-left: 1rem;">
        <div class="card-body">
            <h6>Total Pengeluaran</h6>
            {{ $total_pengeluaran }}
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Transaksi</th>
            <th>Jenis Transaksi</th>
            <th>Dana</th>
        </tr>
    </thead>
    <tbody>
        @foreach($informasi as $index => $item)
        <tr>
            <td scope="row">{{ $index + 1 }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->nama_transaksi }}</td>
            <td>{{ $item->jenis_transaksi }}</td>
            <td>{{ $item->dana }}</td>
            <td>
                <a href="{{ route('admin_kas_edit', $item->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin_kas_delete', $item->id) }}" method="GET">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection