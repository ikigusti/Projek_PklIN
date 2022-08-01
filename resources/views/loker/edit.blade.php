@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data loker
                    </div>
                    <div class="card-body">
                        <form action="{{ route('loker.update', $loker->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">lowongan</label>
                                <input type="text" class="form-control  @error('lowongan') is-invalid @enderror"
                                    name="lowongan" value="{{ $loker->lowongan }}">
                                @error('lowongan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">keterangan</label>
                                <input type="text" class="form-control  @error('keterangan') is-invalid @enderror"
                                    name="keterangan" value="{{ $loker->keterangan }}">
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="mb-3">
                                <label class="form-label">Nama Game</label>
                                <select name="nama_game" value="{{ $loker->nama_game }}"class="form-control @error('nama_game') is-invalid @enderror">
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
                                <label class="form-label">Role</label>
                                <input type="text" class="form-control  @error('role') is-invalid @enderror"
                                    name="role" value="{{ $loker->role }}">
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gambar</label>
                                @if (isset($loker) && $loker->gambar)
                                    <p>
                                        <img src="{{ asset('images/loker/' . $loker->gambar) }}"
                                            class="img-rounded img-responsive" style="width: 75px; height:75px;"
                                            alt="">
                                    </p>
                                @endif
                                <input type="file" class="form-control  @error('gambar') is-invalid @enderror"
                                    name="gambar" value="{{ $loker->Gamabar }}">
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