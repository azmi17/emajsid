@if(!session()->get('session_short_name'))
@php
$current_short_name = $global_short_name;
@endphp
@else
@php
$current_short_name = session()->get('session_short_name');
@endphp
@endif
@php
$current_language_id = \App\Models\Language::where('short_name',$current_short_name)->first()->id;
@endphp

<div class="website-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ HOME }}</a>
                            </li>
                            @foreach($global_categories as $item)
                            @if($current_language_id == $item->language_id)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javscript:void;" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $item->category_name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($item->rSubCategory as $item2)
                                    <li><a class="dropdown-item" href="{{ route('category', $item2->id) }}">{{ $item2->sub_category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @endforeach
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil Masjid</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('sejarahmasjid') }}">Sejarah Masjid</a></li>
                                    <li><a class="dropdown-item" href="{{ route('pengurusmasjid') }}">Pengurus Masjid</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Jadwal Islami
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('jadwalshalat') }}">Jadwal Sholat</a></li>
                                    <li><a class="dropdown-item" href="{{ route('jadwalkhutbah') }}">Jadwal Khutbah</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Informasi Masjid
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('kasmasjid') }}">Kas Masjid</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Zakat
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ route('zakat_penghasilan') }}">Zakat Penghasilan</a></li>
                                    <li><a class="dropdown-item" href="{{ route('zakat_mal') }}">Zakat Mal</a></li>
                                    <li><a class="dropdown-item" href="{{ route('zakat_fitrah') }}">Zakat Fitrah</a></li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('laporan_keuangan.index') }}">Transparansi Dana</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
