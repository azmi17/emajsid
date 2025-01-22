@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Laporan Keuangan Masjid</h4>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Keuangan Masjid</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Deskripsi</th>
                        <th>Dokumen</th>
                        <th style="width:15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->tahun }}</td>
                            <td>{{ $data->bulan }}</td>
                            <td>{{ $data->deskripsi }}</td>
                            <td> <a href="{{ Storage::url($data->file_path) }}" target="_blank"><b>Lihat Laporan</b></a></td>
                            <td>
                                <a href="{{ route('laporan_keuangan.download', $data->id) }}" class="btn btn-primary">Download</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
