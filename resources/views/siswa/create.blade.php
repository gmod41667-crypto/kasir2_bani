@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
    <h1>Tambah Siswa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
             <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 

                <div class="form-group">
                    <label for="nis">nis</label>
                    <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" required value="{{ old('nis') }}">
                    @error('nis')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_siswa">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" required value="{{ old('nama_siswa') }}">
                    @error('nama_siswa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat_siswa">Alamat Siswa</label>
                    <input type="text" name="alamat_siswa" class="form-control @error('alamat_siswa') is-invalid @enderror" id="alamat_siswa" required placeholder="" value="{{ old('alamat_siswa') }}">
                    @error('alamat_siswa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">jenis_kelamin</label>
                    <input type="text" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" required placeholder="" value="{{ old('jenis_kelamin') }}">
                    @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kelas_id">kelas_id</label>
                    <input type="kelas_id" name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id" value="{{ old('kelas_id') }}">
                    @error('kelas_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@stop