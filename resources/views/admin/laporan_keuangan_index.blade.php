@extends('admin.layout.app')

@section('heading', 'Laporan Keuangan')

@section('button')
<a href="{{ route('keuangan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Deskripsi</th>
                                    <th>Dokumen</th>
                                    <th style="width:15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->tahun }}</td>
                                        <td>{{ $data->bulan }}</td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td><a href="{{ Storage::url($data->file_path) }}" target="_blank"><b>Lihat Laporan</b></a></td>
                                        <td>
                                            <a href="{{ route('keuangan.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                            {{-- <form action="{{ route('keuangan.destroy', $data->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Delete</button>
                                            </form> --}}
                                            <a href="{{ route('keuangan.destroy', $data->id) }}" class="btn btn-danger" onClick="return confirm('Apakah anda yakin?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
