@extends('admin.layout.app')

@section('heading', 'Jadwal Khutbah')

@section('button')
<a href="{{ route('admin_jadwal_khutbah_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Jadwal</a>
@endsection

@section('main_content')
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Ustadz</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $index => $item)
                <tr>
                    <td scope="row">{{ $index + 1 }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->ustadz }}</td>
                    <td>
                        <a href="{{ route('admin_jadwal_khutbah_edit', $item->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin_jadwal_khutbah_delete', $item->id) }}" method="GET">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
