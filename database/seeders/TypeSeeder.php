<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
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
        $types = ['front-end', 'back-end', 'full-stack'];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->workflow = $type;
            $newType->slug = Str::slug($newType->workflow, '-');
            $newType->save();
        }
    }
}
