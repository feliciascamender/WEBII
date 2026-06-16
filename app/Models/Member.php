<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'nama_member',
        'email',
        'no_hp',
        'alamat',
    ];

    // Relasi: satu member bisa punya banyak peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'member_id');
    }
}