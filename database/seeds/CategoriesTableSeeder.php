<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['A', 'B', 'C'];

        foreach ($categories as $key => $category) {
            $new_category = new Category;
            $new_category->name = $categories[$key];
            $new_category->slug = Str::slug($categories[$key], '-');
            $new_category->save();
        }
    }
}
