@extends('admin.layout.app')

@section('heading', 'Pengurus Masjid')

@section('main_content')
<div class="section-body">
   
        <div class="row">
            <div class="col-12">


                @foreach($profil as $row)
                <form action="{{ route('admin_profil_masjid_pengurus_update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $row->id }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Existing Post Photo *</label>
                                <div>
                                    <img src="{{ asset('uploads/'.$row->pengurus_photo) }}" alt="" style="width:300px;">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Change Post Photo *</label>
                                <div><input type="file" name="pengurus_photo" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach



            </div>
            
        </div>
    
</div>
@endsection