<?php

namespace App\Http\Resources;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'uuid'      => $this->uuid,
            'user_id'   => $this->user_id,
            'user'      => UserResource::make($this->user),
            'category'  => CategoryResource::make($this->category),
            'brand'     => BrandResource::make($this->brand),
            'title'     => $this->title,
            'body'      => $this->body,
            'inventory' => $this->inventory,
            'published' => $this->published,
            'price'     => $this->price,
        ];
    }
}
