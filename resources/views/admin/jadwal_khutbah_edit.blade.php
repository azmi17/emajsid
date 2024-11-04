@extends('admin.layout.app')

@section('heading', 'Edit Jadwal Khutbah')

@section('button')
<a href="{{ route('admin_jadwal_khutbah_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form method="POST" action="{{ route('admin_jadwal_khutbah_update', $jadwal->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $jadwal->judul }}" required>
            <label for="ustadz">Ustadz:</label>
            <input type="text" name="ustadz" id="ustadz" class="form-control" value="{{ $jadwal->ustadz }}" required>
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $jadwal->tanggal }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection