<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InformationResource extends JsonResource
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
			"surname" => $this->surname,
			"adress" => $this->adress,
			"postal_code" => $this->postal_code,
			"city" => $this->city,
			"country" => $this->country,
			"phone" => $this->phone,
			"email" => $this->email,
			"github" => $this->github,
			"linkedin" => $this->linkedin,
			"description" => $this->description,
			"driving_license" => $this->driving_license,
			"vehicle" => $this->vehicle,
			"birthday" => $this->birthday,
			"motivations" => $this->motivation,
			"facebook" => $this->facebook,
			"image_profil" => $this->url_profil,
        ];
    }
}
