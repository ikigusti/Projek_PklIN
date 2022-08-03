@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Informasi
                    <a href="{{ route('informasi.create') }}" class="btn btn-sm btn-outline-primary" style="float: right">
                        Tambah Data
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <th align="center">No</th>
                                <th align="center">Nama Game</th>
                                <th align="center">Keterangan</th>
                                <th align="center">Pengertian</th>
                                <th align="center">Gambar</th>
                                <th align="center">Aksi</th>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($informasi as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama_game }}</td>
                                         <td>{{ $data->keterangan }}</td>
                                        <td>{{ $data->pengertian }}</td>
                                         <td>
                                            <img src="{{ $data->image() }}" style="width: 100px; height:100px;"
                                                alt="">
                                        </td>
                                        <td>
                                            <form action="{{ route('informasi.destroy', $data->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('informasi.edit', $data->id) }}"
                                                    class="btn btn-sm btn-outline-success">
                                                    Edit
                                                </a> |
                                                <a href="{{ route('informasi.show', $data->id) }}"
                                                    class="btn btn-sm btn-outline-warning">
                                                    Show
                                                </a> |
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Apakah Anda Yakin?')">Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection