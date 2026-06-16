<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    // READ — Daftar semua member
    public function index()
    {
        $members = Member::latest()->get();
        return view('member.index', compact('members'));
    }

    // CREATE — Tampilkan form tambah
    public function create()
    {
        return view('member.create');
    }

    // STORE — Simpan member baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_member' => 'required|string',
            'email'       => 'required|email',
            'no_hp'       => 'required|string',
            'alamat'      => 'nullable|string',
        ], [
            'nama_member.required' => 'Nama member wajib diisi.',
            'nama_member.string'   => 'Nama member harus berupa teks.',
            'email.required'       => 'Email wajib diisi.',
            'email.email'          => 'Format email tidak valid.',
            'no_hp.required'       => 'Nomor HP wajib diisi.',
            'no_hp.string'         => 'Nomor HP harus berupa teks.',
        ]);

        Member::create($request->only([
            'nama_member', 'email', 'no_hp', 'alamat'
        ]));

        return redirect()->route('member.index')
            ->with('success', 'Member berhasil ditambahkan!');
    }

    // EDIT — Tampilkan form edit
    public function edit(string $id)
    {
        $member = Member::findOrFail($id);
        return view('member.edit', compact('member'));
    }

    // UPDATE — Simpan perubahan
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_member' => 'required|string',
            'email'       => 'required|email',
            'no_hp'       => 'required|string',
            'alamat'      => 'nullable|string',
        ], [
            'nama_member.required' => 'Nama member wajib diisi.',
            'nama_member.string'   => 'Nama member harus berupa teks.',
            'email.required'       => 'Email wajib diisi.',
            'email.email'          => 'Format email tidak valid.',
            'no_hp.required'       => 'Nomor HP wajib diisi.',
            'no_hp.string'         => 'Nomor HP harus berupa teks.',
        ]);

        $member = Member::findOrFail($id);
        $member->update($request->only([
            'nama_member', 'email', 'no_hp', 'alamat'
        ]));

        return redirect()->route('member.index')
            ->with('success', 'Member berhasil diperbarui!');
    }

    // DESTROY — Hapus member
    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('member.index')
            ->with('success', 'Member berhasil dihapus!');
    }
}