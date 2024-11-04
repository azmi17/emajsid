@extends('admin.layout.app')

@section('heading', 'Add Jadwal Khutbah')

@section('button')
<a href="{{ route('admin_jadwal_khutbah_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin_jadwal_khutbah_store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group mb-3">
                <label>Ustadz *</label>
                <input type="text" class="form-control" name="ustadz">
            </div>
            <div class="form-group mb-3">
                <label>Judul *</label>
                <input type="text" class="form-control" name="judul">
            </div>
            <div class="form-group mb-3">
                <label>Tanggal *</label>
                <input type="date" class="form-control" name="tanggal">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection