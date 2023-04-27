<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['CSS', 'HTML', 'Javascript', 'Php', 'Laravel', 'Vue', 'SQL'];

        foreach ($technologies as $technologies_name) {
            $new_technologies = new Technology();
            $new_technologies->name = $technologies_name;
            $new_technologies->slug = Str::slug($technologies_name);

            $new_technologies->save();
        }
    }
}
