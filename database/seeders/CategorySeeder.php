<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(10)
                ->create()
                ->each(function (Category $category) {

                    Product::factory()
                           ->create([
                               'category_id' => $category->id,
                               'user_id'     => User::inRandomOrder()->first()->id ?? User::factory()->create()->id
                           ]);

                    Blog::factory(1)
                        ->create([
                            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
                        ])
                        ->each(function (Blog $blog) {

                            //blog comments
                            Comment::factory(1)
                                   ->create([
                                       'user_id'          => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
                                       'commentable_type' => Blog::class,
                                       'commentable_id'   => $blog->id,
                                   ])
                                   ->each(function (Comment $comment) {
                                       //todo add view
                                       Like::factory(1)->create([
                                           'user_id'       => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
                                           'likeable_id'   => $comment->id,
                                           'likeable_type' => Comment::class
                                       ]);
                                   });

                        });

                });
    }
}
