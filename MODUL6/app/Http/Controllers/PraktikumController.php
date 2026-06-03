<?php

namespace App\Http\Controllers;

use App\Models\Praktikan;

class PraktikumController extends Controller
{
    public function beranda()
    {
        $praktikan = Praktikan::biodata();

        return view('pages.beranda', compact('praktikan'));
    }

    public function profil()
    {
        $praktikan = Praktikan::biodata();
        $pengalaman = Praktikan::pengalaman();

        return view('pages.profil', compact('praktikan', 'pengalaman'));
    }

    public function detailPengalaman(string $slug)
    {
        $praktikan = Praktikan::biodata();
        $pengalaman = Praktikan::cariPengalaman($slug);

        if (!$pengalaman) {
            abort(404);
        }

        return view('pages.detail-pengalaman', compact('praktikan', 'pengalaman'));
    }
}