<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            ExperienceSeeder::class,
            ProjectSeeder::class,
            SkillSeeder::class,
            EducationSeeder::class,
            CertificationSeeder::class,
            SocialLinkSeeder::class,
        ]);
    }
}
