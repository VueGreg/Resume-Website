<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "adress" => $this->adress,
            "postal_code" => $this->postal_code,
            "city" => $this->city,
            "country" => $this->country,
            "image" => $this->url_image,
            "alt" => $this->alt_image,
            "website" => $this->url_website,
        ];
    }
}
