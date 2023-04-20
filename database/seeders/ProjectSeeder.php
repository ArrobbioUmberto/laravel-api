<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {

            $first_name = $faker->firstName();
            $last_name = $faker->lastName();
            $full_name = $first_name . ' ' . $last_name;


            $project = new Project();
            $project->title = $faker->unique()->sentence($faker->numberBetween(2, 6));
            $project->client = $full_name;
            $project->description = $faker->text(500);
            $project->url = $faker->url();
            $project->slug = Str::slug($project->title, '-');
            $project->date_creation = $faker->date('Y-m-d');
            $project->save();
        }
    }
}
