<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    public function run(): void
    {
        Education::updateOrCreate(
            ['institution' => 'Universitas Suryakancana', 'degree' => 'S1 Teknik Informatika'],
            [
                'field_of_study' => 'Teknik Informatika',
                'period' => '2021 - 2025',
                'description' => 'Menempuh pendidikan sarjana S1 Teknik Informatika di Universitas Suryakancana dengan predikat Fresh Graduate. Mengembangkan keahlian dalam rekayasa perangkat lunak, pemrograman web berbasis Laravel & MySQL, analisis sistem informasi, pengolahan data terstruktur, serta administrasi teknologi informasi.',
                'sort_order' => 1,
            ]
        );
    }
}
