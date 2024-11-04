@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Kas Masjid</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kas Masjid</li>
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
              <p class="text-justify">Kas Masjid adalah istilah yang digunakan untuk merujuk kepada keuangan atau dana yang dikumpulkan, dikelola, dan digunakan oleh sebuah masjid atau lembaga keagamaan Islam untuk membiayai berbagai kegiatan dan keperluan yang terkait dengan masjid. Dana ini dapat berasal dari berbagai sumber, seperti sumbangan jamaah, donasi, zakat, infaq, shadaqah, dan sumber lainnya.</p>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Keterangan Transaksi</th>
                    <th scope="col">Jenis Transaksi</th>
                    <th scope="col">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($informasi as $index => $item)
                  <tr>
                      <th scope="row">{{ $index + 1 }}</th>
                      <td>{{ $item->tanggal }}</td>
                      <td>{{ $item->nama_transaksi }}</td>
                      <td>{{ $item->jenis_transaksi }}</td>
                      <td>{{ $item->dana }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="card">
                <div class="card-body">
                    <h6>Sisa Kas Saat Ini</h6>
                    {{ $total }}
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection