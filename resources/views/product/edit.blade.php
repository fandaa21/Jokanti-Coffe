@extends('layouts.app')

@section('title', 'Edit product')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit product</h2>
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

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $product->judul) }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $product->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $product->harga) }}" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
            @if ($product->gambar)
                <small>Gambar saat ini:</small><br>
                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->judul }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Perbarui product</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
