<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'uuid'       => $this->uuid,
            'title'      => $this->title,
            'body'       => $this->body,
            'published'  => $this->published,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'category'   => CategoryResource::make($this->category),

            'views' => $this->whenLoaded('views', function () {
                return ViewResource::collection($this->views);
            }),

            'user' => UserResource::make($this->user),

            'comments' => $this->whenLoaded('comments', fn() => CommentResource::collection($this->comments)),

            'likes' => $this->whenLoaded('likes', fn() => LikeResource::collection($this->likes)),
            'media' => $this->whenLoaded('medias' ,fn()=>MediaResource::collection($this->medias)),
        ];
    }
}
