<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $technicalSkills = [
            'Laravel',
            'PHP',
            'MySQL',
            'HTML',
            'CSS',
            'JavaScript',
            'Microsoft Word',
            'Microsoft Excel',
            'Microsoft PowerPoint',
            'Google Docs',
            'Google Sheets',
            'Data Entry',
            'Data Processing',
            'IT Support',
            'Basic Data Analysis',
            'Basic Financial Administration',
            'Basic QA/QC',
            'Documentation & Reporting',
        ];

        $order = 1;
        foreach ($technicalSkills as $tech) {
            Skill::updateOrCreate(
                ['name' => $tech, 'category' => 'Technical Skills'],
                [
                    'category' => 'Technical Skills',
                    'familiarity_level' => 'Terbiasa menggunakan',
                    'icon' => null,
                    'sort_order' => $order++,
                ]
            );
        }

        $softSkills = [
            'Communication',
            'Teamwork',
            'Problem Solving',
            'Analytical Thinking',
            'Attention to Detail',
            'Adaptability',
            'Time Management',
            'Responsibility',
            'Fast Learning',
            'Discipline',
        ];

        $softOrder = 1;
        foreach ($softSkills as $soft) {
            Skill::updateOrCreate(
                ['name' => $soft, 'category' => 'Soft Skills'],
                [
                    'category' => 'Soft Skills',
                    'familiarity_level' => 'Familiar with',
                    'icon' => null,
                    'sort_order' => $softOrder++,
                ]
            );
        }
    }
}
