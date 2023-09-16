<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->id,
            'name'    => $this->name,
            'family'  => $this->family,
            'email'   => $this->email,
            'media'   => MediaResource::make($this->medias),
            'blog'    =>$this->whenLoaded('blogs',fn()=>BlogResource::collection($this->blogs)),
            'product' =>$this->whenLoaded('products',fn()=>ProductResource::collection($this->products)),
            'like'    =>$this->whenLoaded('likes',fn()=>LikeResource::collection($this->likes)),
        ];
    }
}
