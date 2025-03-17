@extends('front.layout.app')

@section('main_content')
@if($setting_data->news_ticker_status == "Show")
<div class="news-ticker-item">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="acme-news-ticker">
                    <div class="acme-news-ticker-label">{{ LATEST_NEWS }}</div>
                    <div class="acme-news-ticker-box">
                        <ul class="my-news-ticker">
                            @php $i=0; @endphp
                            @foreach($post_data as $item)
                                @php $i++; @endphp
                                @if($i>$setting_data->news_ticker_total)
                                    @break
                                @endif
                                <li><a href="{{ route('news_detail',$item->id) }}">{{ $item->post_title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="home-main">
    <div class="container">

        {{-- HEADER MASJID --}}
        <div class="image-container">
            <img src="{{ asset('uploads/'.'masjid-at-thoat.jpg') }}" alt="Masjid">

            <!-- Teks di atas gambar -->
            <div class="overlay-text">
                <h1 class="text-center">Masjid At-Thoat Jatisampurna</h1>
                <h4 class="text-center">~Dari Masjid Membangun Ummat~</h4>
            </div>


            {{-- Card di atas gambar --}}
            <div class="cards-overlay">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2><i class="fa fa-home fa"></i></h2>
                                <h5 class="card-title">Tentang Kami</h5>
                                <p class="card-text">Berawal dari sebuah langgar kecil di Jatisampurna, Bekasi perumahan Grand Mutiara 1, Masjid At-Thoat terus berusaha membangun Ummat dan Mensejahterakan Masyarakat Sekitarnya.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2><i class="fa fa-database"></i></h2>
                                <h5 class="card-title">Manajemen Masjid</h5>
                                <p class="card-text">Masjid At-Thoat berusaha menerapkan manajemen masjid zaman rasulullah dengan aplikasi di zaman modern dan dengan inovatif sehingga bisa diterima oleh masyarakat.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2><i class="fa fa-life-ring"></i></h2>
                                <h5 class="card-title">Support</h5>
                                <p class="card-text">Support dakwah kami dengan sedekah, infaq, zakat dan wakaf di Masjid At-Thoat​. Semoga Allah selalu melimpahkan barokah dan rezeki kepada Anda sekeluarga di rumah</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- PROFIL MASJID --}}
        <div class="row g-2">
            <div class="col-lg-12 col-md-12 text-center p-3">
                <h1 class="">Profil Masjid At-Thoat</h1>
                <div class="alert alert-light" role="alert">
                    <p>Sejarah Masjid At-Tho'at pertama kali dibangun saat perumahan Grand Mutiara 1 dibangun, yaitu sekitar 10 tahun yang lalu atau tepatnya ditahun 2013. Pada waktu itu, masjid At-Tho'at hanyalah berupa musholla kecil yang dibangun untuk peribadatan umat islam warga perumahan. namun, seiring perkembangan perumahan dan meningkatnya jamaah musholla, pengurus musholla saat itu memutuskan merenovasi musholla sekaligus mengubahnya menjadi masjid dengan meminta donasi kepada donatur perumahan dan juga warga agar ikut menyumbang dalam pembangunan masjid di tahun 2017. setelah setahun berjalan, pada 2018, masjid At-Tho'at resmi berdiri dibawah saksi mata para warga serta donatur perumahan. Dan hingga saat ini, masjid At-Tho'at dalam pelaksanaannya untuk peribadatan telah ikut membantu kegiatan islami seperti, pengajian umum, shalat dua ied, pengajian bapak-bapak dan ibu-ibu, dan lain sebagainya.</p>
                </div>
            </div>
        </div>

        {{-- MISI KAMI --}}
        <div class="row g-2">
            <div class="col-lg-12 col-md-12">
                <h1 class="text-center p-3">Misi Kami</h1>
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="card bg-secondary text-white">
                            <div class="card-body text-center">
                                <h5 class="card-title">Jamaah Mandiri</h5>
                                <p class="card-text">Memberikan pelatihan sholat kepada warga yang belum bisa sholat, sehingga tidak malu lagi untuk pergi ke masjid untuk sholat berjamaah.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="card bg-secondary text-white">
                            <div class="card-body text-center">
                                <h5 class="card-title">Peta Dakwah</h5>
                                <p class="card-text">Masjid harus memiliki peta dakwah yang jelas, wilayah kerja yang nyata, dan jama’ah yang terdata. Sehingga bisa terukur di pertanggungjawabkan.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="card bg-secondary text-white">
                            <div class="card-body text-center">
                                <h5 class="card-title">Pembinaan Remaja</h5>
                                <p class="card-text">Menyelenggarakan membina remaja masjid melalui kegitan pelatihan dan pemberdayaan ekonomi ummat dan kegiatan kesenian.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="card bg-secondary text-white">
                            <div class="card-body text-center">
                                <h5 class="card-title">Majlis Ta'lim</h5>
                                <p class="card-text">Menyelenggarakan pembinaan ummat melalui kegiatan Majlis Ta’lim dan Peringatan Hari-hari Besar Islam dan Menjadikan masjid sebagai pesantren.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- TRANSPARANSI DANA --}}
        <div class="image-sldr p-5">
            <img src="{{ asset('uploads/'.'transaparansi-dana.jpg') }}" alt="Masjid">
            <div class="overlay-text-dana text-center">
                <h4>TRANSPARANSI DANA</h4>
                <h6>Ingin tahu lebih detail transparansi dana masjid At-Thoat</h6>
                <h6>Silahkan kunjungi halaman dengan klik tombol dibawah ini</h6>
                <a href="{{ route('laporan_keuangan.index') }}" class="btn btn-secondary">TRANSPARANSI DANA</a>
            </div>
        </div>

        {{-- SUPPORT PROGRAM --}}
        <div class="row g-2">
            <div class="col-lg-12 col-md-12 text-center p-3">
                <h1>Support Program Dakwah</h1>
                <div class="alert alert-light" role="alert">
                    <p>Support Program Dakwah Masjid At-Thoat selalu terdepan dalam aksi-aksi sosial. Anda dapat menjadi bagian dari kami dengan menjadi donatur untuk program -program Masjid At-Thoat. Insya Allah kami selalu berusaha untuk menyalurkan 100% sedekah anda kepada yang berhak menerima.</p>
                    <a href="#" class="btn btn-primary">Lihat Program Dakwah</a>
                </div>
            </div>
        </div>

        <div class="row g-2">
            <h2 class="p-3">Apa yang terbaru Hari ini ?</h2>
            <div class="col-lg-8 col-md-12 left">
                @php $i=0; @endphp
                @foreach($post_data as $item)
                @php $i++; @endphp
                @if($i>1)
                    @break
                @endif
                <div class="inner">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">{{ $item->rSubCategory->sub_category_name }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail',$item->id) }}">{{ $item->post_title }}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        @if($item->author_id==0)
                                            @php
                                            $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                            @endphp
                                        @else
                                            @php
                                            $user_data = \App\Models\Author::where('id',$item->author_id)->first();
                                            @endphp
                                        @endif
                                        <a href="javascript:void;">{{ $user_data->name }}</a>
                                    </div>
                                    <div class="date">
                                        @php
                                        $ts = strtotime($item->updated_at);
                                        $updated_date = date('d F, Y',$ts);
                                        @endphp
                                        <a href="javascript:void;">{{ $updated_date }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-12">
                @php $i=0; @endphp
                @foreach($post_data as $item)
                @php $i++; @endphp
                @if($i==1)
                    @continue
                @endif
                @if($i>3)
                    @break
                @endif
                <div class="inner inner-right">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">{{ $item->rSubCategory->sub_category_name }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail',$item->id) }}">{{ $item->post_title }}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        @if($item->author_id==0)
                                            @php
                                            $user_data = \App\Models\Admin::where('id',$item->admin_id)->first();
                                            @endphp
                                        @else
                                            @php
                                            $user_data = \App\Models\Author::where('id',$item->author_id)->first();
                                            @endphp
                                        @endif
                                        <a href="javascript:void;">{{ $user_data->name }}</a>
                                    </div>
                                    <div class="date">
                                        @php
                                        $ts = strtotime($item->updated_at);
                                        $updated_date = date('d F, Y',$ts);
                                        @endphp
                                        <a href="javascript:void;">{{ $updated_date }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="search-section">
    <div class="container">
        <div class="inner">
            <form action="{{ route('search_result') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="text_item" class="form-control" placeholder="{{ TITLE_DESCRIPTION }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="category" id="category" class="form-select">
                                <option value="">{{ SELECT_CATEGORY }}</option>
                                @foreach($category_data as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="sub_category" id="sub_category" class="form-select">
                                <option value="">{{ SELECT_SUBCATEGORY }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">{{ SEARCH }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="home-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 left-col">
                <div class="left">

                    @foreach($sub_category_data as $item)

                        @if(count($item->rPost)==0)
                            @continue
                        @endif

                        <!-- News Of Category -->
                        <div class="news-total-item">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <h2>{{ $item->sub_category_name }}</h2>
                                </div>
                                <div class="col-lg-6 col-md-12 see-all">
                                    <a href="{{ route('category',$item->id) }}" class="btn btn-primary btn-sm">{{ SEE_ALL_NEWS }}</a>
                                </div>
                                <div class="col-md-12">
                                    <div class="bar"></div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($item->rPost as $single)
                                    @if($loop->iteration == 2)
                                        @break
                                    @endif
                                    <div class="col-lg-6 col-md-12">
                                        <div class="left-side">
                                            <div class="photo">
                                                <img src="{{ asset('uploads/'.$single->post_photo) }}" alt="">
                                            </div>
                                            <div class="category">
                                                <span class="badge bg-success">{{ $item->sub_category_name }}</span>
                                            </div>
                                            <h3><a href="{{ route('news_detail',$single->id) }}">{{ $single->post_title }}</a></h3>
                                            <div class="date-user">
                                                <div class="user">
                                                    @if($single->author_id==0)
                                                        @php
                                                        $user_data = \App\Models\Admin::where('id',$single->admin_id)->first();
                                                        @endphp
                                                    @else
                                                        @php
                                                        $user_data = \App\Models\Author::where('id',$single->author_id)->first();
                                                        @endphp
                                                    @endif
                                                    <a href="javascript:void;">{{ $user_data->name }}</a>
                                                </div>
                                                <div class="date">
                                                    @php
                                                    $ts = strtotime($single->updated_at);
                                                    $updated_date = date('d F, Y',$ts);
                                                    @endphp
                                                    <a href="javascript:void;">{{ $updated_date }}</a>
                                                </div>
                                            </div>
                                            <div class="post-short-text">
                                                {!! $single->post_detail !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-lg-6 col-md-12">
                                    <div class="right-side">

                                        @foreach($item->rPost as $single)
                                            @if($loop->iteration == 1)
                                                @continue
                                            @endif
                                            @if($loop->iteration == 6)
                                                @break
                                            @endif
                                            <div class="right-side-item">
                                                <div class="left">
                                                    <img src="{{ asset('uploads/'.$single->post_photo) }}" alt="">
                                                </div>
                                                <div class="right">
                                                    <div class="category">
                                                        <span class="badge bg-success">{{ $item->sub_category_name }}</span>
                                                    </div>
                                                    <h2><a href="{{ route('news_detail',$single->id) }}">{{ $single->post_title }}</a></h2>
                                                    <div class="date-user">
                                                        <div class="user">
                                                            @if($single->author_id==0)
                                                                @php
                                                                $user_data = \App\Models\Admin::where('id',$single->admin_id)->first();
                                                                @endphp
                                                            @else
                                                                @php
                                                                $user_data = \App\Models\Author::where('id',$single->author_id)->first();
                                                                @endphp
                                                            @endif
                                                            <a href="javascript:void;">{{ $user_data->name }}</a>
                                                        </div>
                                                        <div class="date">
                                                            @php
                                                            $ts = strtotime($single->updated_at);
                                                            $updated_date = date('d F, Y',$ts);
                                                            @endphp
                                                            <a href="javascript:void;">{{ $updated_date }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- // News Of Category -->
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('front.layout.sidebar')
            </div>
        </div>
    </div>
</div>

{{-- LOKASI & ALAMAT MASJID --}}
<div class="row g-2">
    <div class="col-lg-12 col-md-12 text-center p-3">
        <h1>Alamat Masjid</h1>
        <div class="map-container">
            <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.1487796299145!2d110.39269477471262!3d-7.645888675201066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8ecafe674119e59b!2sMusholla+At-Thoat!5e0!3m2!1sid!2sid!4v1700000000000"
            width="100%"
            height="400"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>

<script>
    (function($){
        $(document).ready(function(){
            $("#category").on("change", function(){
                var categoryId = $("#category").val();
                if(categoryId) {
                    $.ajax({
                        type: "get",
                        url: "{{ url('/subcategory-by-category/') }}" + "/" + categoryId,
                        success: function(response) {
                            $("#sub_category").html(response.sub_category_data);
                        },
                        error:function(err){

                        }
                    })
                }
            })
        });
    })(jQuery);
</script>

@endsection
