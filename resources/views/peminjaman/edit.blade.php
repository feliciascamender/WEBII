@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
<div class="container-sm">
    <div class="card" style="margin-top:32px;">

        <div class="card-title">Edit Peminjaman</div>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>✕ {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Pilih Buku</label>
                    <select name="buku_id" class="form-select">
                        <option value="">-- Pilih Buku --</option>
                        @foreach ($buku as $b)
                            <option value="{{ $b->id }}"
                                {{ old('buku_id', $peminjaman->buku_id) == $b->id ? 'selected' : '' }}>
                                {{ $b->judul }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Pilih Member</label>
                    <select name="member_id" class="form-select">
                        <option value="">-- Pilih Member --</option>
                        @foreach ($members as $m)
                            <option value="{{ $m->id }}"
                                {{ old('member_id', $peminjaman->member_id) == $m->id ? 'selected' : '' }}>
                                {{ $m->nama_member }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam"
                           id="tanggal_pinjam"
                           class="form-input"
                           value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali"
                           id="tanggal_kembali"
                           class="form-input"
                           value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}"
                           min="{{ $peminjaman->tanggal_pinjam }}">
                    <small style="color:#a08060; font-size:11px; margin-top:4px;">
                        * Tidak boleh kurang dari tanggal pinjam
                    </small>
                </div>
            </div>

            <div style="display:flex; gap:10px; justify-content:center; margin-top:30px;">
                <a href="{{ route('peminjaman.index') }}" class="btn-submit"
                   style="background:transparent; border:1px solid #5a3a1a;
                          color:#a08060; text-decoration:none; padding:10px 28px;">
                    ← Kembali
                </a>
                <button type="submit" class="btn-submit" style="margin:0;">
                    ✦ Simpan Perubahan
                </button>
            </div>

        </form>
    </div>
</div>

<script>
    const tglPinjam  = document.getElementById('tanggal_pinjam');
    const tglKembali = document.getElementById('tanggal_kembali');

    tglPinjam.addEventListener('change', function () {
        tglKembali.min = this.value;
        if (tglKembali.value && tglKembali.value < this.value) {
            tglKembali.value = this.value;
        }
    });
</script>
@endsection