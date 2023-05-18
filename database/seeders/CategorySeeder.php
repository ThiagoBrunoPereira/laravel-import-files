<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::updateOrCreate([
            'name' => 'Remessa Parcial'
        ]);
        Category::updateOrCreate([
            'name' => 'Remessa'
        ]);
    }
}
