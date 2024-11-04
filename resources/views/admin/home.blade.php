@extends('admin.layout.app')

@section('heading', 'Dashboard')

@section('main_content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fab fa-bandcamp"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Jenis Berita</h4>
                </div>
                <div class="card-body">
                    {{ $total_subcategory }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Berita</h4>
                </div>
                <div class="card-body">
                    {{ $total_news }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-question-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total FAQ</h4>
                </div>
                <div class="card-body">
                    {{ $total_faq }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection