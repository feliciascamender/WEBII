@extends('layouts.app')

@section('title', 'Daftar Member')

@section('content')
<div class="container">
    <div class="card">

        <div class="card-title">Daftar Member</div>

        @if (session('success'))
            <div class="alert-success">✓ {{ session('success') }}</div>
        @endif

        <a href="{{ route('member.create') }}" class="btn-tambah">+ Tambah Member</a>

        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Member</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $index => $m)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $m->nama_member }}</td>
                        <td>{{ $m->email }}</td>
                        <td>{{ $m->no_hp }}</td>
                        <td>{{ $m->alamat ?? '-' }}</td>
                        <td style="display:flex; gap:6px;">

                            <a href="{{ route('member.edit', $m->id) }}"
                               class="btn-ubah">Ubah</a>

                            <form method="POST"
                                  action="{{ route('member.destroy', $m->id) }}"
                                  onsubmit="return confirm('Yakin hapus member ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; color:#a08060;">
                            Belum ada data member.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection