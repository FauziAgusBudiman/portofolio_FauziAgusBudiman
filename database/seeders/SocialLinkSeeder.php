<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            [
                'platform' => 'GitHub',
                'label' => 'github.com/fauziagusbudiman',
                'url' => 'https://github.com/fauziagusbudiman',
                'icon' => 'bi-github',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'platform' => 'LinkedIn',
                'label' => 'linkedin.com/in/fauziagusbudiman',
                'url' => 'https://linkedin.com/in/fauziagusbudiman',
                'icon' => 'bi-linkedin',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'platform' => 'WhatsApp',
                'label' => '+62 812-3456-7890',
                'url' => 'https://wa.me/6281234567890',
                'icon' => 'bi-whatsapp',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'platform' => 'Email',
                'label' => 'fauziagusbudiman@example.com',
                'url' => 'mailto:fauziagusbudiman@example.com',
                'icon' => 'bi-envelope-fill',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($links as $link) {
            SocialLink::updateOrCreate(
                ['platform' => $link['platform']],
                $link
            );
        }
    }
}
