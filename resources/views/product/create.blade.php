@extends('layouts.app')

@section('title', 'Tambah product')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah product</h2>
    </div>
    <div class="card-body">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
