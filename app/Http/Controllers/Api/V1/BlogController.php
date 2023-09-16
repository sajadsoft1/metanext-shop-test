<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogRequest $request)
    {
           $data = Blog::with(['comments' , 'medias' , 'likes' ,'views' ])->get();

//        $blogs = Blog::with('translations')->get();

        return $this->successResponse(BlogResource::collection($data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $blog = Blog::create($data);



//        $blog = Blog::create([
//            'published'   => 1,
//            'category_id' => 1,
//            'user_id'     => 1,
//        ]);

//        $blog->translations()->create(
//            [
//                'key'    => 'title',
//                'locale' => 'fa',
//                'value'  => 'بلاگ 4',
//            ],
//        );

//        $blog->translations()->create(
//            [
//                'key'    => 'title',
//                'locale' => 'en',
//                'value'  => 'blog 3',
//            ],);

//        return $blog->load('translations');

        return $this->successResponse(BlogResource::make($blog));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->load('category' , 'likes' , 'comments' , 'views');
        return $this->successResponse(BlogResource::make($blog));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
       $blog->update($request->validated());

       return $this->successResponse(BlogResource::make($blog), "The blog has been successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $data=$blog->delete();
        return $this->successResponse('' , 'The blog has been successfully deleted' , 200);


    }
}
