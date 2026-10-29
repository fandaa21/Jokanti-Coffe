@extends('layouts.app')

@section('title', 'Daftar Ulasan')

@section('header')
    <h1>Daftar Ulasan</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Ulasan Tersedia</h2>
        </div>
        <div class="card-body">
            <p><a href="{{ route('ulasan.create') }}" class="btn btn-primary mb-3">Tambah Ulasan</a></p>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rating</th>
                        <th>Isi</th>
                        <th>Nama</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ulasan as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->rating }}</td>
                            <td>{{ $item->isi }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                @if ($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" width="100">
                                @else
                                    <span>Tidak ada gambar</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('ulasan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('ulasan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
