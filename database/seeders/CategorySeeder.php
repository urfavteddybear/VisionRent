<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = ['DSLR', 'Mirrorless', 'Action Camera', 'Lenses', 'Accessories', 'Lighting', 'Audio'];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}

