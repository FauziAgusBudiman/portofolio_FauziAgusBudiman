<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Sistem Informasi Pengelolaan Perpustakaan',
                'slug' => 'sistem-informasi-perpustakaan',
                'category' => 'Web Application',
                'description' => 'Sistem informasi berbasis web yang dirancang untuk mengelola sirkulasi buku, keanggotaan, peminjaman, serta pengembalian buku di perpustakaan MTs Tanwiriyyah secara akurat dan efisien.',
                'technologies' => 'Laravel, MySQL, Blade, Bootstrap, JavaScript',
                'features' => "Authentication & Hak Akses Bertingkat\nUser Management (Administrator & Pustakawan)\nManajemen Data Buku & Kategori\nManajemen Data Anggota Perpustakaan\nTransaksi Peminjaman Buku Otomatis\nTransaksi Pengembalian Buku & Perhitungan Denda\nLaporan Transaksi & Statistik Sirkulasi",
                'image' => null,
                'demo_url' => null,
                'github_url' => 'https://github.com/fauziagusbudiman',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Sistem Inventory Toko Grosir',
                'slug' => 'sistem-inventory-toko-grosir',
                'category' => 'Web Application',
                'description' => 'Aplikasi inventory berbasis web untuk Toko Grosir Ahmad yang membantu pencatatan barang, supplier, pemantauan stok real-time, serta histori transaksi keluar masuk barang secara transparan.',
                'technologies' => 'Laravel, MySQL, Blade, CSS3, JavaScript',
                'features' => "Sistem Autentikasi Keamanan\nManajemen Kategori Barang\nManajemen Supplier & Kontak\nKatalog Produk & Satuan Barang\nMonitoring Stok Barang Real-time\nPencatatan Transaksi Barang Masuk\nPencatatan Transaksi Barang Keluar\nLaporan Stok & Riwayat Mutasi Barang",
                'image' => null,
                'demo_url' => null,
                'github_url' => 'https://github.com/fauziagusbudiman',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Sistem Pakar Analisis Skrining Tingkat Kecanduan Game Online',
                'slug' => 'sistem-pakar-kecanduan-game-online',
                'category' => 'Expert System',
                'description' => 'Sistem pakar berbasis web untuk membantu melakukan analisis skrining tingkat kecanduan game online menggunakan metode Certainty Factor (CF) dengan inferensi diagnosis akurat.',
                'technologies' => 'Laravel, MySQL, Certainty Factor, Blade, Chart.js',
                'features' => "Kuisioner Interaktif dengan Pembobotan Nilai MB dan MD\nMesin Inferensi Certainty Factor (CF)\nKlasifikasi Hasil Diagnosis: Ringan, Sedang, Tinggi\nSaran Solusi dan Rekomendasi Penanganan Klinis/Edukasi\nRiwayat Konsultasi & Export Hasil Analisis",
                'image' => null,
                'demo_url' => null,
                'github_url' => 'https://github.com/fauziagusbudiman',
                'is_featured' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($projects as $proj) {
            Project::updateOrCreate(
                ['slug' => $proj['slug']],
                $proj
            );
        }
    }
}
