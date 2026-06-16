@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')
<div class="container">
    <div class="card">

        <div class="card-title">Daftar Buku</div>

        @if (session('success'))
            <div class="alert-success">✓ {{ session('success') }}</div>
        @endif

        <a href="{{ route('buku.create') }}" class="btn-tambah">+ Tambah Buku</a>

        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($buku as $index => $b)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $b->judul }}</td>
                        <td>{{ $b->penulis }}</td>
                        <td>{{ $b->penerbit }}</td>
                        <td>{{ $b->tahun_terbit }}</td>
                        <td style="display:flex; gap:6px;">

                            <a href="{{ route('buku.edit', $b->id) }}"
                               class="btn-ubah">Ubah</a>

                            <form method="POST"
                                  action="{{ route('buku.destroy', $b->id) }}"
                                  onsubmit="return confirm('Yakin hapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; color:#a08060;">
                            Belum ada data buku.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection