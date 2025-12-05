<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectGalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = DB::table('projects')->select('id', 'slug', 'name')->get();

        $galleries = [];

        foreach ($projects as $project) {
            for ($i = 1; $i <= 5; $i++) {
                $galleries[] = [
                    'project_id' => $project->id,
                    'image' => "assets/images/gallery/project/{$project->slug}_{$i}.jpg",
                    'caption' => "Preview of {$project->name} – Image {$i}",
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('galleries')->insert($galleries);
    }
}
