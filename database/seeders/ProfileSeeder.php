<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::updateOrCreate(
            ['id' => 1],
            [
                'full_name' => 'Fauzi Agus Budiman',
                'headline' => 'Fresh Graduate S1 Teknik Informatika',
                'sub_headline' => 'Universitas Suryakancana, Cianjur',
                'bio' => 'Fresh Graduate S1 Teknik Informatika yang memiliki dedikasi tinggi dalam pengembangan sistem berbasis web, pengolahan data, IT Support, administrasi, dan dokumentasi teknis yang terstruktur.',
                'about_text' => "Saya merupakan fresh graduate Teknik Informatika dari Universitas Suryakancana yang memiliki pengalaman dan minat mendalam dalam pengembangan sistem berbasis web, pengolahan data, IT Support, administrasi, dan dokumentasi teknis.\n\nMemiliki kemampuan analitis yang tajam, teliti dalam pengolahan data dan administrasi, serta berpengalaman membangun aplikasi web terstruktur menggunakan Laravel dan MySQL. Saya siap berkontribusi secara optimal dalam lingkungan kerja yang profesional, dinamis, dan berorientasi pada hasil.",
                'avatar' => null,
                'cv_file' => '#',
                'email' => 'fauziagusbudiman@example.com',
                'phone' => '+62 812-3456-7890',
                'whatsapp' => '+62 812-3456-7890',
                'location' => 'Cianjur, Jawa Barat',
                'is_available' => true,
            ]
        );
    }
}
