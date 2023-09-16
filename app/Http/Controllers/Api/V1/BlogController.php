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
    public function index()
    {
        $data = Blog::with(['category', 'user'])->get();
        return $this->successResponse(
            BlogResource::collection($data)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $blog = Blog::create($data);

        return $this->successResponse(
            BlogResource::make(
                $blog->load(['category', 'user'])),
            "blog store success",
            201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog->load('category', 'likes', 'comments', 'medias', 'views', 'user');
        return $this->successResponse(BlogResource::make($blog));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->update($request->validated());

        return $this->successResponse(BlogResource::make(
            $blog->load(['category', 'user'])),
            "The blog has been successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        return $this->successResponse($blog->delete(), 'The blog has been successfully deleted');
    }


    public function toggle(Blog $blog)
    {
        $blog->published = !$blog->published;
        $blog->save();

        return $this->successResponse(
            BlogResource::make($blog->load(['user', 'category'])),
            "Message status updated successfully"
        );


    }
}
