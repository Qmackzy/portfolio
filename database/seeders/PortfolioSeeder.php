<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;
use App\Models\Project;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Data Skills
        Skill::create([
            'name' => 'PHP',
            'icon' => '</>',
            'description' => 'Pengembangan aplikasi web menggunakan PHP.'
        ]);

        Skill::create([
            'name' => 'Laravel',
            'icon' => 'L',
            'description' => 'Pengembangan aplikasi web menggunakan framework Laravel.'
        ]);

        Skill::create([
            'name' => 'MySQL',
            'icon' => 'DB',
            'description' => 'Pengelolaan database untuk aplikasi berbasis web.'
        ]);

        Skill::create([
            'name' => 'IT Support',
            'icon' => 'IT',
            'description' => 'Troubleshooting dan dukungan teknologi informasi.'
        ]);

        // Data Projects
        Project::create([
            'title' => 'COGS',
            'label' => 'PROJECT',
            'description' => 'Sistem informasi berbasis web yang sedang dikembangkan menggunakan Laravel dan MySQL.',
            'technologies' => ['Laravel', 'PHP', 'MySQL'],
        ]);
    }
}
