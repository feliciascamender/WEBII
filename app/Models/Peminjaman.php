<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'buku_id',
        'member_id',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    // Relasi: peminjaman milik satu buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    // Relasi: peminjaman milik satu member
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}