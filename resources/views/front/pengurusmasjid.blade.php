@extends('front.layout.app')

@section('main_content')
<style>
    .centered-image {
    display: flex; 
    justify-content: center; 
    align-items: center; 
    height: 100vh; 
  }
  
  .centered-image img {
    max-width: 100%; 
    height: auto; 
  }
</style>

<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Pengurus Masjid</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengurus Masjid</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 centered-image">
                @if ($profil)
                <img src="{{ asset('uploads/' . $profil->pengurus_photo) }}" alt="Foto Pengurus">
                @else
                    <p>Data pengurus tidak ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection