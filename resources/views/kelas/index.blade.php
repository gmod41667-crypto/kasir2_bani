@extends('adminlte::page')

@section('title', 'Data Kelas')

@section('content_header')
    <h1>Data Kelas</h1>
@stop

@section('content')
    <div class="card">
        {{-- Header dengan Style AdminLTE (Title di kiri, Tools di kanan) --}}
        <div class="card-header">
            <h3 class="card-title">Daftar Kelas</h3>
            <div class="card-tools">
                <a href="{{ route('kelas.create') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah Kelas
                </a>

            </div>
        </div>
        
        {{-- Bagian Pencarian & Alert (Diberi padding agar rapi) --}}
        <div class="card-body pb-0">
            <form action="{{ route('kelas.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama Kelas atau Kode Kelas" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </form>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>

        {{-- Bagian Tabel (Style disamakan dengan Data Guru: p-0, table-hover, text-nowrap) --}}
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama Kelas</th>
                        <th>Jurusan_id</th>
                        <th>Jenjang_id</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $key => $kela)
                    <tr>
                        <td>{{ $kelas->firstItem() + $key }}</td>
                        <td>{{ $kela->nama_kelas }}</td>
                        <td>{{ $kela->jurusan_id }}</td>
                        <td>{{ $kela->jenjang_id }}</td>
                        <td>{{ $kela->status }}</td>
                        <td>
                            {{-- Tombol Aksi disinkronkan stylenya (btn-sm, icon on  ly) --}}
                            <a class="btn btn-info btn-sm" href="{{ route('kelas.show', $kela->id) }}" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('kelas.edit', $kela->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('kelas.destroy', $kela->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            {!! $kelas->appends(request()->query())->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@stop