<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
    ];

    // Relasi: satu buku bisa ada di banyak peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'buku_id');
    }
}