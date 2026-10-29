@extends('layouts.app')

@section('title', 'Daftar product')

@section('header')
    <h1>Daftar product</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>product Tersedia</h2>
        </div>
        <div class="card-body">
            <body>
            <p><a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Tambah product</a></p>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
            <table class="table">
                <thead>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <body>
                            @foreach ($product as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>Rp {{ number_format($item->harga, 2, ',', '.') }}</td>
                                    <td>
                                        @if ($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" width="100">
                                        @else
                                            <span>Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('product.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus product ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                     @endforeach
                </body>
            </table>
        </div>
    </div>
@endsection
