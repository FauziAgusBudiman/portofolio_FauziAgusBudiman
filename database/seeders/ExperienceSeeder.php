<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'company' => 'MTs Tanwiriyyah, Cianjur',
                'role' => 'Web Developer / Kerja Praktik',
                'period' => 'Jul 2025 - Nov 2025',
                'type' => 'Kerja Praktik',
                'description' => 'Membangun Sistem Informasi Pengelolaan Perpustakaan berbasis web menggunakan Laravel dan MySQL. Sistem mencakup autentikasi, pengelolaan pengguna, buku, anggota, peminjaman dan pengembalian buku serta pengujian sistem.',
                'sort_order' => 1,
            ],
            [
                'company' => 'Toko Grosir Ahmad, Cianjur',
                'role' => 'Web Developer',
                'period' => 'Mar 2026 - May 2026',
                'type' => 'Web Developer',
                'description' => 'Mengembangkan aplikasi inventory berbasis web untuk membantu pengelolaan barang, kategori, supplier, stok, serta transaksi barang masuk dan barang keluar.',
                'sort_order' => 2,
            ],
            [
                'company' => 'Myrobo Cianjur CIRCUIT 2026',
                'role' => 'Juri Penilaian Maze Solving',
                'period' => 'May 2026',
                'type' => 'Juri & Evaluator',
                'description' => 'Melakukan penilaian lomba Maze Solving berdasarkan kriteria dan aturan yang telah ditentukan serta berkoordinasi dengan panitia dan juri lainnya untuk menjaga proses penilaian berjalan tertib dan objektif.',
                'sort_order' => 3,
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::updateOrCreate(
                ['company' => $exp['company'], 'role' => $exp['role']],
                $exp
            );
        }
    }
}
