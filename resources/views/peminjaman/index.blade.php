@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<div class="container">
    <div class="card">

        <div class="card-title">Daftar Peminjaman</div>

        @if (session('success'))
            <div class="alert-success">✓ {{ session('success') }}</div>
        @endif

        <a href="{{ route('peminjaman.create') }}" class="btn-tambah">
            + Tambah Peminjaman
        </a>

        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Nama Member</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peminjaman as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->buku->judul ?? '-' }}</td>
                        <td>{{ $p->member->nama_member ?? '-' }}</td>
                        <td>{{ $p->tanggal_pinjam }}</td>
                        <td>{{ $p->tanggal_kembali }}</td>
                        <td style="display:flex; gap:6px;">

                            <a href="{{ route('peminjaman.edit', $p->id) }}"
                               class="btn-ubah">Ubah</a>

                            <form method="POST"
                                  action="{{ route('peminjaman.destroy', $p->id) }}"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; color:#a08060;">
                            Belum ada data peminjaman.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection