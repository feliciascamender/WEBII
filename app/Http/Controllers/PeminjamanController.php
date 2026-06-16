<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Member;

class PeminjamanController extends Controller
{
    // READ — Daftar semua peminjaman
    public function index()
    {
        // with() untuk eager load relasi buku & member
        $peminjaman = Peminjaman::with(['buku', 'member'])->latest()->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    // CREATE — Tampilkan form tambah
    public function create()
    {
        $buku    = Buku::all();
        $members = Member::all();
        return view('peminjaman.create', compact('buku', 'members'));
    }

    // STORE — Simpan peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'buku_id'          => 'required|exists:buku,id',
            'member_id'        => 'required|exists:members,id',
            'tanggal_pinjam'   => 'required|date',
            'tanggal_kembali'  => 'required|date|after_or_equal:tanggal_pinjam',
        ], [
            'buku_id.required'                  => 'Buku wajib dipilih.',
            'buku_id.exists'                    => 'Buku tidak ditemukan.',
            'member_id.required'                => 'Member wajib dipilih.',
            'member_id.exists'                  => 'Member tidak ditemukan.',
            'tanggal_pinjam.required'           => 'Tanggal pinjam wajib diisi.',
            'tanggal_pinjam.date'               => 'Format tanggal pinjam tidak valid.',
            'tanggal_kembali.required'          => 'Tanggal kembali wajib diisi.',
            'tanggal_kembali.date'              => 'Format tanggal kembali tidak valid.',
            'tanggal_kembali.after_or_equal'    => 'Tanggal kembali tidak boleh kurang dari tanggal pinjam.',
        ]);

        Peminjaman::create($request->only([
            'buku_id', 'member_id', 'tanggal_pinjam', 'tanggal_kembali'
        ]));

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil ditambahkan!');
    }

    // EDIT — Tampilkan form edit
    public function edit(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $buku       = Buku::all();
        $members    = Member::all();
        return view('peminjaman.edit', compact('peminjaman', 'buku', 'members'));
    }

    // UPDATE — Simpan perubahan
    public function update(Request $request, string $id)
    {
        $request->validate([
            'buku_id'         => 'required|exists:buku,id',
            'member_id'       => 'required|exists:members,id',
            'tanggal_pinjam'  => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ], [
            'buku_id.required'               => 'Buku wajib dipilih.',
            'member_id.required'             => 'Member wajib dipilih.',
            'tanggal_pinjam.required'        => 'Tanggal pinjam wajib diisi.',
            'tanggal_kembali.required'       => 'Tanggal kembali wajib diisi.',
            'tanggal_kembali.after_or_equal' => 'Tanggal kembali tidak boleh kurang dari tanggal pinjam.',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->only([
            'buku_id', 'member_id', 'tanggal_pinjam', 'tanggal_kembali'
        ]));

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil diperbarui!');
    }

    // DESTROY — Hapus peminjaman
    public function destroy(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil dihapus!');
    }
}