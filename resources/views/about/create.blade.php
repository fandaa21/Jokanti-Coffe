@extends('layouts.app')

@section('title', 'Create About')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah About</h2>
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

        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="isi">Isi</label>
                <textarea name="isi" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="whatsapp">WhatsApp</label>
                <input type="url" name="whatsapp" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="instagram">Instagram</label>
                <input type="url" name="instagram" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="tokopedia">Tokopedia</label>
                <input type="url" name="tokopedia" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="grabfood">GrabFood</label>
                <input type="url" name="grabfood" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="gofood">GoFood</label>
                <input type="url" name="gofood" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
            </div>
            <div class="form-group mb-3">
                <label for="logo">Logo</label>
                <input type="file" class="form-control-file" id="logo" name="logo" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('about.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
