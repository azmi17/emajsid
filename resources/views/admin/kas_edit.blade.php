@extends('admin.layout.app')

@section('heading', 'Edit Kas Masjid')

@section('button')
<a href="{{ route('admin_kas_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form method="POST" action="{{ route('admin_kas_update', $informasi->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $informasi->tanggal }}" required>
            <label for="nama_transaksi">Nama Transaksi:</label>
            <input type="text" name="nama_transaksi" id="nama_transaksi" class="form-control" value="{{ $informasi->nama_transaksi }}" required>
            <label for="jenis_transaksi">Jenis Transaksi:</label>
            <select class="form-control" name="jenis_transaksi">
                <option></option>
                <option value="pemasukan">Pemasukan</option>
                <option value="pengeluaran">Pengeluaran</option>
            </select>            
            <label for="dana">Dana:</label>
            <input type="number" name="dana" id="dana" class="form-control" value="{{ $informasi->dana }}" required>
            
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection