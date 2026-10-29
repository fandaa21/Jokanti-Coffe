@extends('layouts.app')

@section('title', 'Edit About Us')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit About Us</h2>
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

        <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $about->judul) }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="isi">Isi</label>
                <textarea name="isi" class="form-control" rows="5" required>{{ old('isi', $about->isi) }}</textarea>
            </div>
            <div class="form-group mb-3">
                <label for="whatsapp">WhatsApp</label>
                <input type="url" name="whatsapp" class="form-control" value="{{ old('whatsapp', $about->whatsapp) }}">
            </div>
            <div class="form-group mb-3">
                <label for="instagram">Instagram</label>
                <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $about->instagram) }}">
            </div>
            <div class="form-group mb-3">
                <label for="tokopedia">Tokopedia</label>
                <input type="url" name="tokopedia" class="form-control" value="{{ old('tokopedia', $about->tokopedia) }}">
            </div>
            <div class="form-group mb-3">
                <label for="grabfood">GrabFood</label>
                <input type="url" name="grabfood" class="form-control" value="{{ old('grabfood', $about->grabfood) }}">
            </div>
            <div class="form-group mb-3">
                <label for="gofood">GoFood</label>
                <input type="url" name="gofood" class="form-control" value="{{ old('gofood', $about->gofood) }}">
            </div>
            <div class="form-group mb-3">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control">
                @if ($about->gambar)
                    <img src="{{ asset('storage/' . $about->gambar) }}" alt="{{ $about->judul }}" width="100">
                @endif
            </div>
            <div class="form-group mb-3">
                <label for="logo">Logo</label>
                <input type="file" name="logo" class="form-control">
                @if ($about->logo)
                    <img src="{{ asset('storage/' . $about->logo) }}" alt="Logo {{ $about->judul }}" width="100">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('about.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
