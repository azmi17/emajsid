@extends('front.layout.app')

@section('main_content')
<div class="page-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Zakat Fitrah</h2>
        <nav class="breadcrumb-container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Zakat Fitrah</li>
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
        <p class="text-justify">Zakat Fitrah adalah zakat yang wajib dikeluarkan oleh setiap Muslim yang mampu pada bulan Ramadan atau sebelum hari raya Idul Fitri. Zakat ini bertujuan untuk membersihkan diri orang yang memberikannya dari segala kejelekan atau kekurangan selama berpuasa. Zakat Fitrah juga berfungsi untuk membantu mereka yang kurang mampu sehingga mereka juga dapat merayakan Idul Fitri dengan gembira. Zakat Fitrah harus dibayarkan sebelum shalat Idul Fitri dilaksanakan. Idealnya, ini dilakukan beberapa hari sebelum Idul Fitri agar pihak yang berhak mendapatkan zakat dapat memanfaatkannya untuk merayakan hari raya.</p>
        <h5>Nisab Zakat Fitrah</h5>
          <p>Nisab zakat fitrah ditentukan berdasarkan jenis makanan pokok yang umum dikonsumsi di masyarakat setempat. Nisab ini biasanya diukur dalam satuan berat, misalnya kilogram. Pada umumnya, besaran zakat fitrah adalah 2,5 kg dari jenis bahan makanan pokok yang biasa dikonsumsi. Jenis bahan makanan ini dapat berbeda-beda satu wilayah dengan wilayah lainnya. Sebagai contoh, di Indonesia, nisab zakat fitrah sering diukur dalam bentuk beras, sehinggan di Indonesia, besaran zakat per jiwa merupakan 2,5 kg dari beras. Jumlah persyaratan nisab zakat fitrah ini dapat bervariasi, dan biasanya ditetapkan oleh otoritas keagamaan setempat atau lembaga yang berkompeten dalam menentukan zakat.</p>        
      </div>
    </div>
  </div>
</div>
@endsection