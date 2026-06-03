<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Praktikan extends Model
{
    public static function biodata(): array
    {
        return [
            'nama' => 'Felicia Scamender',
            'nim' => '2410817320005',
            'prodi' => 'Teknologi Informasi',
            'email' => '2410817320005@mhs.ulm.ac.id',
            'hobi' => ['Gaming', 'Reading', 'Talking'],
            'skill' => ['Prompting', 'Database Management'],
            'gambar' => 'images/profile.jpg',
            'bio' => 'MSeorang mahasiswa TI yang aktif belajar lewat praktik langsung, sering bereksperimen dengan proyek dan kode nyata, serta fokus mencari cara paling efektif untuk menyelesaikan tugas dan mengembangkan keterampilan teknisnya.',
        ];
    }

    public static function pengalaman(): array
    {
        return [
            [
                'slug' => 'humas-member',
                'judul' => 'Anggota Divisi Humas',
                'waktu' => '2025',
                'lokasi' => 'Himpunan Mahasiswa Teknologi Informasi',
                'gambar' => 'images/humas.jpg',
                'ringkasan' => 'Bertugas mengelola komunikasi, publikasi, relasi, dan penyampaian informasi antara HMTI dengan mahasiswa, pihak kampus, organisasi lain, serta masyarakat umum.',
                'deskripsi' => 'Dengan menjadi anggota Divisi HuMas, saya mendapatkan kemampuan berkomunikasi dengan baik, membangun relasi, mengelola informasi, bekerja sama dalam tim, serta menyampaikan publikasi kegiatan organisasi secara jelas dan menarik.',
                'kesan' => 'Merasa lebih percaya diri dalam berkomunikasi, lebih peka terhadap penyampaian informasi, dan lebih memahami pentingnya menjaga hubungan baik dengan berbagai pihak.',
            ],
            [
                'slug' => 'tedxulm',
                'judul' => 'Anggota Public Relation TEDxULM',
                'waktu' => '2026',
                'lokasi' => 'TEDxULM',
                'gambar' => 'images/tedx.jpg',
                'ringkasan' => 'Membantu menjalin komunikasi dengan pihak internal maupun eksternal, menyampaikan informasi kegiatan, menjaga relasi dengan mitra, serta mendukung kebutuhan publikasi dan koordinasi acara TEDxULM.',
                'deskripsi' => 'Dalam kegiatan ini, saya dilatih untuk berkomunikasi dengan berbagai pihak, menyampaikan informasi dengan jelas, menjaga hubungan baik dengan mitra, serta mendukung kebutuhan publikasi dan koordinasi acara TEDxULM.',
                'kesan' => 'ergabung dalam Public Relation TEDxULM menjadi pengalaman yang berkesan karena saya dapat melihat langsung bagaimana sebuah acara besar dibangun melalui komunikasi, koordinasi, dan relasi yang terjaga dengan baik.',
            ],
            [
                'slug' => 'humas-member',
                'judul' => 'Master of Ceremonies',
                'waktu' => '2025',
                'lokasi' => 'Program Studi Teknologi Informasi',
                'gambar' => 'images/mc.jpg',
                'ringkasan' => 'Memandu jalannya kegiatan, membuka dan menutup acara, mengatur alur acara, serta menjaga suasana agar tetap tertib, komunikatif, dan sesuai rundown.',
                'deskripsi' => 'Pengalaman menjadi MC melatih kemampuan berbicara di depan umum, mengatur intonasi, membaca situasi audiens, serta beradaptasi ketika terjadi perubahan teknis selama acara berlangsung.',
                'kesan' => 'Menjadi MC memberi kesan yang berharga karena saya merasa lebih percaya diri, lebih berani tampil di depan banyak orang, dan belajar bahwa komunikasi yang baik sangat berpengaruh terhadap kelancaran sebuah acara.',
            ],
            [
                'slug' => 'pass-class',
                'judul' => 'Lulus Kelas Pak Andre (SOON)',
                'waktu' => '2027',
                'lokasi' => 'Praktikum Pemrograman II',
                'gambar' => 'images/lulussoon.jpg',
                'ringkasan' => 'Menyelesaikan seluruh materi, latihan, dan evaluasi yang diberikan pada kelas Pemrograman II bersama Andre Soon.',
                'deskripsi' => 'Mendapatkan pemahaman yang lebih baik mengenai konsep dan penerapan materi Pemrograman II serta meningkatkan kemampuan berpikir logis dalam menyelesaikan permasalahan.',
                'kesan' => 'Kelas Pemrograman II bersama Andre Soon berlangsung menarik, terstruktur, dan membantu memahami materi dengan lebih jelas.',
            ],
        ];
    }

    public static function cariPengalaman(string $slug): ?array
    {
        foreach (self::pengalaman() as $item) {
            if ($item['slug'] === $slug) {
                return $item;
            }
        }

        return null;
    }
}