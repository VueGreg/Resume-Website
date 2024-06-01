<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TechnologyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->url_image,
            'alt' => $this->alt_image,
            'projects_count' => $this->projects_count,
            'category' => new CategoryResource($this->whenLoaded('categories')),
        ];
    }
}
