@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Loker
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Lowongan</label>
                            <input type="text" class="form-control" name="lowongan" value="{{ $loker->lowongan }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" value="{{ $loker->keterangan }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Game</label>
                            <input type="text" class="form-control" name="nama_game" value="{{ $loker->nama_game }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control" name="role" value="{{ $loker->role }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gambar</label>
                            @if (isset($loker) && $loker->gambar)
                                <p>
                                    <img src="{{ asset('images/loker/' . $loker->gambar) }}" class="img-rounded img-responsive"
                                        style="width: 75px; height:75px;" alt="">
                                </p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('loker.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection