<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'count' => $this->count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'order' => new OrderResource($this->whenLoaded('order')),
            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
