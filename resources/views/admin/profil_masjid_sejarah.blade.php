@extends('admin.layout.app')

@section('heading', 'Edit Sejarah Masjid')

@section('main_content')
<div class="section-body">
   
        <div class="row">
            <div class="col-12">


                @foreach($profil_data as $row)
                <form action="{{ route('admin_profil_masjid_sejarah_update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $row->id }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Title *</label>
                                <input type="text" class="form-control" name="sejarah_title" value="{{ $row->sejarah_title }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Detail *</label>
                                <textarea name="sejarah_detail" class="form-control" cols="30" rows="10">{{ $row->sejarah_detail }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status?</label>
                                <select name="sejarah_status" class="form-control">
                                    <option value="Show" @if($row->sejarah_status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if($row->sejarah_status == 'Hide') selected @endif>Hide</option>
                                </select>
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