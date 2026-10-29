@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>About</h2>
    </div>
    <div class="card-body">
        @if (count($about) == 0)
            <p><a href="{{ route('about.create') }}" class="btn btn-primary mb-3">Tambah About</a></p>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th>WhatsApp</th>
                    <th>Instagram</th>
                    <th>Tokopedia</th>
                    <th>GrabFood</th>
                    <th>GoFood</th>
                    <th>Gambar</th>
                    <th>Logo</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($about as $abt)
                <tr>
                    <td>{{ $abt->judul }}</td>
                    <td>{{ $abt->isi }}</td>
                    <td>{{ $abt->whatsapp }}</td>
                    <td>{{ $abt->instagram }}</td>
                    <td>{{ $abt->tokopedia }}</td>
                    <td>{{ $abt->grabfood }}</td>
                    <td>{{ $abt->gofood }}</td>
                    <td>
                        @if($abt->gambar)
                            <img src="{{ asset('storage/' . $abt->gambar) }}" alt="{{ $abt->judul }}" width="100">
                        @endif
                    </td>
                    <td>
                        @if($abt->logo)
                            <img src="{{ asset('storage/' . $abt->logo) }}" alt="Logo {{ $abt->judul }}" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('about.edit', $abt) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
