<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            SkillsTableSeeder::class,
            ProjectsTableSeeder::class,
            ProjectGalleriesTableSeeder::class,
            BlogsTableSeeder::class,
            ToolSeeder::class,
            PersonalQualitySeeder::class,
            EducationSeeder::class,
            AiProviderSeeder::class,
        ]);

    }
}
