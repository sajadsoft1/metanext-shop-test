<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Product;
use App\Models\User;
use App\Services\Translation\TranslationService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(4)
            ->create()
            ->each(function (User $user) {

                //blogs
                Blog::factory(10)
                    ->create([
                        'user_id' => $user->id,
                    ])
                    ->each(function (Blog $blog) use ($user) {

                        //blog comments
                        Comment::factory(rand(10, 12))
                               ->create([
                                   'user_id'          => $user->id,
                                   'commentable_type' => Blog::class,
                                   'commentable_id'   => $blog->id,
                               ])
                               ->each(function (Comment $comment) use ($user) {
                                   //todo add view
                                   Like::factory(1)->create([
                                       'user_id'       => $user->id,
                                       'likeable_id'   => $comment->id,
                                       'likeable_type' => Comment::class
                                   ]);
                               });

                    });


                Product::factory(4)
                       ->create([
                           'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id
                       ]);


            });


    }
}
