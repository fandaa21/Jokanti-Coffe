@extends('layouts.app')

@section('title', 'Edit Ulasan')

@section('header')
    <h1>Edit Ulasan</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Form Edit Ulasan</h2>
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
            <form action="{{ route('ulasan.update', $ulasan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" value="{{ $ulasan->rating }}" required>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi</label>
                    <textarea class="form-control" id="isi" name="isi" rows="3" required>{{ $ulasan->isi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $ulasan->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @if ($ulasan->gambar)
                        <img src="{{ asset('storage/' . $ulasan->gambar) }}" alt="{{ $ulasan->nama }}" width="100">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
