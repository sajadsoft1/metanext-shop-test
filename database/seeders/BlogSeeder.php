<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Media;
use App\Models\User;
use App\Models\View;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::factory(10)
            ->create()
            ->each(function (Blog $blog) {

                Comment::factory(2)->create([
                    'commentable_type' => Blog::class,
                    'commentable_id'   => $blog->id
                ]);

                Like::factory(3)->create([
                    'likeable_type' => Blog::class,
                    'likeable_id'   => $blog->id
                ]);

                Media::factory(1)->create([
                    'mediable_type' => Blog::class,
                    'mediable_id'   => $blog->id
                ]);

                View::factory(10)->create([
                    'viewable_type' => Blog::class,
                    'viewable_id'   => $blog->id
                ]);

            });
    }
}
