<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['tag 1', 'tag 2', 'tag 3'];

        foreach ($tags as $key => $tag) {
            $new_tag = new Tag;
            $new_tag->name = $tags[$key];
            $new_tag->slug = Str::slug($tags[$key], '-');
            $new_tag->save();
        }
    }
}
