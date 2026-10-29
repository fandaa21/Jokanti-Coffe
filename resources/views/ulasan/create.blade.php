@extends('layouts.app')

@section('title', 'Tambah Ulasan')

@section('header')
    <h1>Tambah Ulasan</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Form Tambah Ulasan</h2>
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
            <form action="{{ route('ulasan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" class="form-control" id="rating" name="rating" value="{{ old('rating') }}" required>
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label">Isi</label>
                    <textarea class="form-control" id="isi" name="isi" rows="3" required>{{ old('isi') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
