<?php

namespace App\Http\Resources;

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
            'name' => $this->name,
            'code' => $this->code,
            'price' => (float)$this->price,
            'oldPrice' => (float)$this->old_price,
            'delivery' => $this->delivery,
            'images' => $this->images->pluck('image_url'),
            'comments' => CommentResource::collection($this->comments),
            'description' => $this->description,
        ];
    }
}

