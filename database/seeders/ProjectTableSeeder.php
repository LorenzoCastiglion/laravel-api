<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Project;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){

            $project = new Project;
            $project->name=$faker->words(3, true);
            $project->slug=Str::slug($project->name, '-');
            $project->description=$faker->paragraph();
            // $project->dev_lang=$faker->words(4, true);
            $project->framework=$faker->words(3, true);
            $project->team=$faker->firstName();
            $project->git_link=$faker->url();
            $project->diff_lvl=$faker->numberBetween(0, 10);
            $project->save();
            
        }
    }
}
