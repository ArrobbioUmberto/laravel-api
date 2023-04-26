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
        $type = ['FrontEnd', 'Backend', 'Programming', 'Full stack', 'Design', 'Ops'];

        foreach ($type as $type_name) {
            $new_type = new Type();
            $new_type->name = $type_name;
            $new_type->Str::slug($type_name);

            $new_type->save();
        }
    }
}
