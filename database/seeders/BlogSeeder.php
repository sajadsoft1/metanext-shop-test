<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::factory(10)->create()->each(function (Blog $blog){
                Comment::factory(2)->create([

                    'user_id'=> User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
                ]);

                Like::factory(3)->create([
                   'user_id'=> User::inRandomOrder()->first()->id ?? User::factory()->create()->id
                ]);

                Media::factory(1)->create();
        });
    }
}
