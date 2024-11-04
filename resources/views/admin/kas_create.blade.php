@extends('admin.layout.app')

@section('heading', 'Add Kas Masjid')

@section('button')
<a href="{{ route('admin_kas_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_kas_store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group mb-3">
                <label>Tanggal *</label>
                <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="form-group mb-3">
                <label>Nama Transaksi *</label>
                <input type="text" class="form-control" name="nama_transaksi">
            </div>
            <div class="form-group mb-3">
                <label>Jenis Transaksi *</label>
                <select class="form-control" name="jenis_transaksi">
                    <option></option>
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Dana *</label>
                <input type="number" class="form-control" name="dana">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection