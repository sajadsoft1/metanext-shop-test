<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $blogs = Blog::with('translations')->get();

        return BlogResource::collection($blogs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = Blog::create([
            'published'   => 1,
            'category_id' => 1,
            'user_id'     => 1,
        ]);

        $blog->translations()->create(
            [
                'key'    => 'title',
                'locale' => 'fa',
                'value'  => 'بلاگ 4',
            ],
        );

        $blog->translations()->create(
            [
                'key'    => 'title',
                'locale' => 'en',
                'value'  => 'blog 3',
            ],);

        return $blog->load('translations');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
