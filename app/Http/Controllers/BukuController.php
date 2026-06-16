<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    // READ — Daftar semua buku
    public function index()
    {
        $buku = Buku::latest()->get();
        return view('buku.index', compact('buku'));
    }

    // CREATE — Tampilkan form tambah
    public function create()
    {
        return view('buku.create');
    }

    // STORE — Simpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string',
            'penulis'      => 'required|string',
            'penerbit'     => 'required|string',
            'tahun_terbit' => 'required|numeric|gt:1800|lt:2024',
        ], [
            'judul.required'        => 'Judul buku wajib diisi.',
            'judul.string'          => 'Judul buku harus berupa teks.',
            'penulis.required'      => 'Nama penulis wajib diisi.',
            'penulis.string'        => 'Nama penulis harus berupa teks.',
            'penerbit.required'     => 'Nama penerbit wajib diisi.',
            'penerbit.string'       => 'Nama penerbit harus berupa teks.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.numeric'  => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.gt'       => 'Tahun terbit harus lebih besar dari 1800.',
            'tahun_terbit.lt'       => 'Tahun terbit harus lebih kecil dari 2024.',
        ]);

        Buku::create($request->only([
            'judul', 'penulis', 'penerbit', 'tahun_terbit'
        ]));

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    // EDIT — Tampilkan form edit
    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // UPDATE — Simpan perubahan
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul'        => 'required|string',
            'penulis'      => 'required|string',
            'penerbit'     => 'required|string',
            'tahun_terbit' => 'required|numeric|gt:1800|lt:2024',
        ], [
            'judul.required'        => 'Judul buku wajib diisi.',
            'judul.string'          => 'Judul buku harus berupa teks.',
            'penulis.required'      => 'Nama penulis wajib diisi.',
            'penulis.string'        => 'Nama penulis harus berupa teks.',
            'penerbit.required'     => 'Nama penerbit wajib diisi.',
            'penerbit.string'       => 'Nama penerbit harus berupa teks.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.numeric'  => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.gt'       => 'Tahun terbit harus lebih besar dari 1800.',
            'tahun_terbit.lt'       => 'Tahun terbit harus lebih kecil dari 2024.',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->only([
            'judul', 'penulis', 'penerbit', 'tahun_terbit'
        ]));

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    // DESTROY — Hapus buku
    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus!');
    }
}