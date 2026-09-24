<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    public function run(): void
    {
        $certifications = [
            [
                'title' => 'TOEFL ITP',
                'issuer' => 'ETS / Lembaga Sertifikasi Bahasa',
                'issue_date' => 'February 2026',
                'score_or_credential' => 'Score 513',
                'credential_url' => null,
                'sort_order' => 1,
            ],
            [
                'title' => 'Intro to Data Analytics',
                'issuer' => 'RevoU',
                'issue_date' => 'December 2025',
                'score_or_credential' => 'Course Certificate',
                'credential_url' => null,
                'sort_order' => 2,
            ],
            [
                'title' => 'Intro to Software Engineering',
                'issuer' => 'RevoU',
                'issue_date' => 'December 2025',
                'score_or_credential' => 'Course Certificate',
                'credential_url' => null,
                'sort_order' => 3,
            ],
            [
                'title' => 'MATLAB Onramp',
                'issuer' => 'MathWorks',
                'issue_date' => '2025',
                'score_or_credential' => 'Verified Course Certificate',
                'credential_url' => null,
                'sort_order' => 4,
            ],
            [
                'title' => 'MATLAB Image Processing Onramp',
                'issuer' => 'MathWorks',
                'issue_date' => '2025',
                'score_or_credential' => 'Verified Course Certificate',
                'credential_url' => null,
                'sort_order' => 5,
            ],
        ];

        foreach ($certifications as $cert) {
            Certification::updateOrCreate(
                ['title' => $cert['title'], 'issuer' => $cert['issuer']],
                $cert
            );
        }
    }
}
