@if(!session()->get('session_short_name'))
    @php
    $current_short_name = $global_short_name;
    @endphp
@else
    @php
    $current_short_name = session()->get('session_short_name');
    @endphp
@endif

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="">
        <title>Website Masjid</title>

        <link rel="icon" type="image/png" href="{{ asset('uploads/'.$global_setting_data->favicon) }}">

        @include('front.layout.styles')

        @include('front.layout.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>

        <!-- Google Analytics -->
        @if($global_setting_data->analytic_status == 'Show')
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $global_setting_data->analytic_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $global_setting_data->analytic_id }}');
        </script>
        @endif

        <style>
            .website-menu,
            .website-menu .bg-primary,
            .acme-news-ticker-label,
            .search-section button[type="submit"],
            .home-content .left .news-total-item .see-all a,
            .video-content,
            .footer input[type="submit"],
            .scroll-top,
            .widget .poll button,
            .nav-pills .nav-link.active,
            .related-news .owl-nav .owl-prev,
            .related-news .owl-nav .owl-next,
            .bg-website,
            .page-item.active .page-link {
                background: #{{ $global_setting_data->theme_color_1 }}!important;
            }

            .acme-news-ticker,
            .page-item.active .page-link {
                border-color: #{{ $global_setting_data->theme_color_1 }}!important;
            }

            ul.my-news-ticker li a,
            .home-content .left .news-total-item .left-side h3 a:hover,
            .home-content .left .news-total-item .right-side-item .right h2 a:hover,
            .home-content .left .news-total-item .left-side .date-user .user a:hover,
            .home-content .left .news-total-item .left-side .date-user .date a:hover,
            .home-content .left .news-total-item .right-side-item .right .date-user .user a:hover,
            .home-content .left .news-total-item .right-side-item .right .date-user .date a:hover,
            .widget .news-item .right h2 a:hover,
            .widget .news-item .right .date-user .user a:hover,
            .widget .news-item .right .date-user .date a:hover,
            .nav-pills .nav-link,
            .video-carousel .owl-nav .owl-prev,
            .video-carousel .owl-nav .owl-next,
            li.breadcrumb-item a,
            .category-page-post-item h3 a:hover,
            .category-page-post-item .date-user .user a:hover,
            .category-page-post-item .date-user .date a:hover,
            .related-news .item h3 a:hover,
            .related-news .item .date-user .user a:hover,
            .related-news .item .date-user .date a:hover,
            .accordion-button:not(.collapsed),
            .login-form a,
            ul.pagination .page-link {
                color: #{{ $global_setting_data->theme_color_1 }}!important;
            }


            .home-main .inner .text-inner .category span,
            .home-main .inner .text-inner .category span a,
            .home-content .left .news-total-item .left-side .category span,
            .home-content .left .news-total-item .left-side .category span a,
            .home-content .left .news-total-item .right-side-item .right .category span,
            .home-content .left .news-total-item .right-side-item .right .category span a,
            .widget .news-item .right .category span,
            .widget .news-item .right .category span a,
            .category-page-post-item .category span,
            .category-page-post-item .category span a,
            .tag-section-content span {
                background: #{{ $global_setting_data->theme_color_2 }}!important;
            }

            .nav-pills .nav-link.active,
            .page-item.active .page-link {
                color: #fff!important;
            }

            .image-container {
                position: relative;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .image-container img {
                width: 100%;f
                filter: blur(1px); /* Efek blur pada gambar */
            }

            .image-sldr {
                position: relative;
                width: 100%;
                max-width: 1200px; /* Sesuaikan dengan ukuran slider */
                height: 400px; /* Sesuaikan tinggi slider */
                margin: auto;
                overflow: hidden;
            }

            .image-sldr img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                filter: blur(3px); /* Efek blur pada gambar */
            }

            .overlay-text-dana {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: rgba(0, 0, 0, 0.5);
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                font-weight: bold;
                text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
            }

            .cards-overlay {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 80%; /* Sesuaikan dengan kebutuhan */
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .cards-overlay .row {
                width: 100%;
            }

            .card {
                background: rgba(255, 255, 255, 0.9); /* Transparansi untuk menonjolkan card */
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            }

            .overlay-text {
                position: absolute;
                top: 20%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 2.5rem;
                color: white;
                font-weight: bold;
                text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
            }

            .map-container {
                max-width: 800px;  /* Maksimal lebar */
                margin: 0 auto;    /* Agar center */
            }

           /* Make the image fully responsive */
            .carousel-inner img {
                width: 100%;
                height: 100%;
            }
        </style>

    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row" onmousedown='return false;' onselectstart='return false;'>
                    <div class="col-md-6">
                        <ul>
                            @if($global_setting_data->top_bar_date_status == 'Show')
                            <li class="today-text">{{ TODAY }}: {{ date('F d, Y') }}</li>
                            @endif

                            @if($global_setting_data->top_bar_email_status == 'Show')
                            <li class="email-text">{{ $global_setting_data->top_bar_email }}</li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="right">

                            @php
                            $current_lang_id = \App\Models\Language::where('short_name',$current_short_name)->first()->id;

                            $page_data = \App\Models\Page::where('language_id',$current_lang_id)->first();
                            @endphp

                            @if($page_data->faq_status == 'Show')
                            <li class="menu"><a href="{{ route('faq') }}">{{ $page_data->faq_title }}</a></li>
                            @endif

                            @if($page_data->login_status == 'Show')
                            <li class="menu"><a href="{{ route('login') }}">{{ $page_data->login_title }}</a></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="heading-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('front.layout.nav')

        @yield('main_content')

        <div class="spacer"></div>

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="item">
                            <h2 class="heading">{{ FOOTER_COL_1_HEADING }}</h2>
                            <p>
                                {{ FOOTER_COL_1_TEXT }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="item">
                            <h2 class="heading">{{ FOOTER_COL_2_HEADING }}</h2>
                            <ul class="useful-links">
                                <li><a href="{{ route('home') }}">{{ HOME }}</a></li>
                                <li><a href="{{ route('jadwalshalat') }}">Jadwal Shalat</a></li>
                                <li><a href="{{ route('zakat_penghasilan') }}">Kalkulator Zakat</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="item">
                            <h2 class="heading">{{ FOOTER_COL_3_HEADING }}</h2>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="right">
                                    {{ FOOTER_ADDRESS }}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="right">
                                    {{ FOOTER_EMAIL }}
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="left">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="right">
                                    {{ FOOTER_PHONE }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            {{ COPYRIGHT_TEXT }}
        </div>

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

        @include('front.layout.scripts_footer')

        <div id="loader"></div>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <script>
                    iziToast.error({
                        title: '',
                        position: 'topRight',
                        message: '{{ $error }}',
                    });
                </>
            @endforeach
        @endif

        @if(session()->get('error'))
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('error') }}',
                });
            </script>
        @endif

        @if(session()->get('success'))
            <script>
                iziToast.success({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('success') }}',
                });
            </script>
        @endif
   </body>
</html>
