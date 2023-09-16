<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Media;
use App\Models\Product;
use App\Models\User;
use App\Models\View;
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
                Media::factory(1)->create([
                    'mediable_type' => User::class,
                    'mediable_id'   => $user->id
                ]);

                //blogs
                Blog::factory(10)
                    ->create([
                        'user_id' => $user->id,
                    ])
                    ->each(function (Blog $blog) use ($user) {

                        Media::factory(1)->create([
                            'mediable_type' => Blog::class,
                            'mediable_id'   => $blog->id
                        ]);

                        Like::factory(1)->create([
                            'user_id'       => $user->id,
                            'likeable_id'   => $blog->id,
                            'likeable_type' => Blog::class
                        ]);

                        View::factory(4)->create([
                            'user_id'       => $user->id,
                            'viewable_id'   => $blog->id,
                            'viewable_type' => Blog::class
                        ]);

                        //blog comments
                        Comment::factory(rand(10, 12))
                               ->create([
                                   'user_id'          => $user->id,
                                   'commentable_type' => Blog::class,
                                   'commentable_id'   => $blog->id,
                               ])
                               ->each(function (Comment $comment) use ($user) {
                                   Like::factory(1)->create([
                                       'user_id'       => $user->id,
                                       'likeable_id'   => $comment->id,
                                       'likeable_type' => Comment::class
                                   ]);
                               });


                    });


                Product::factory(4)
                       ->create([
                           'user_id' => $user->id
                       ])
                       ->each(function (Product $product) use ($user) {
                           Media::factory(1)->create([
                               'mediable_type' => Product::class,
                               'mediable_id'   => $product->id
                           ]);

                           Like::factory(1)->create([
                               'user_id'       => $user->id,
                               'likeable_id'   => $product->id,
                               'likeable_type' => Product::class
                           ]);

                           View::factory(4)->create([
                               'user_id'       => $user->id,
                               'viewable_id'   => $product->id,
                               'viewable_type' => Product::class
                           ]);

                           //blog comments
                           Comment::factory(rand(10, 12))
                                  ->create([
                                      'user_id'          => $user->id,
                                      'commentable_type' => Product::class,
                                      'commentable_id'   => $product->id,
                                  ])
                                  ->each(function (Comment $comment) use ($user) {
                                      Like::factory(1)->create([
                                          'user_id'       => $user->id,
                                          'likeable_id'   => $comment->id,
                                          'likeable_type' => Comment::class
                                      ]);
                                  });
                       });


            });


    }
}
