@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data informasi
                    </div>
                    <div class="card-body">
                        <form action="{{ route('informasi.update', $informasi->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama Game</label>
                                <select name="nama_game" value="{{ $informasi->nama_game }}"class="form-control @error('nama_game') is-invalid @enderror">
                                    <option value="Mobile Legends">Mobile Legends</option>
                                      <option value="PlayerUnknown's Battlegrounds">PlayerUnknown's Battlegrounds</option>
                                      <option value="Free Fire">Free Fire</option>
                                </select>
                                @error('nama_game')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control  @error('keterangan') is-invalid @enderror"
                                    name="keterangan" value="{{ $informasi->keterangan }}">
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pengertian</label>
                                <input type="text" class="form-control  @error('pengertian') is-invalid @enderror"
                                    name="pengertian" value="{{ $informasi->pengertian }}">
                                @error('pengertian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar</label>
                                @if (isset($informasi) && $informasi->gambar)
                                    <p>
                                        <img src="{{ asset('images/informasi/' . $informasi->gambar) }}"
                                            class="img-rounded img-responsive" style="width: 75px; height:75px;"
                                            alt="">
                                    </p>
                                @endif
                                <input type="file" class="form-control  @error('gambar') is-invalid @enderror"
                                    name="gambar" value="{{ $informasi->Gambar }}">
                                @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection