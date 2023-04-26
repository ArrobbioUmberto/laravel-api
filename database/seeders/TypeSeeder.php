<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['FrontEnd', 'Backend', 'Programming', 'Full stack', 'Design', 'Ops'];

        foreach ($types as $type_name) {
            $new_type = new Type();
            $new_type->name = $type_name;
            $new_type->slug = Str::slug($type_name);

            $new_type->save();
        }
    }
}
