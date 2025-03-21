@extends('admin.layout.app')

@section('heading', 'Edit Laporan Keuangan')

@section('button')
<a href="{{ route('lapkeu.index') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('lapkeu.update', $lapkeu->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <select name="tahun" id="tahun" class="form-control">
                                @for($i = date('Y'); $i >= 2000; $i--)
                                    <option value="{{ $i }}" {{ $lapkeu->tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="bulan" class="form-label">Bulan</label>
                            <select name="bulan" id="bulan" class="form-control">
                                @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                                    <option value="{{ $bulan }}" {{ $lapkeu->bulan == $bulan ? 'selected' : '' }}>{{ $bulan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $lapkeu->deskripsi }}">
                        </div>

                        <div class="mb-3">
                            <label for="file_path" class="form-label">Unggah Laporan</label>

                            @if($lapkeu->file_path)
                                <p>File yang diunggah sebelumnya:
                                    <a href="{{ Storage::url($lapkeu->file_path) }}" target="_blank">Lihat File</a>
                                </p>
                            @endif

                            <input type="file" name="file_path" id="file_path" class="form-control">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
