<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            "image" => $this->url_image,
            'alt' => $this->alt_image,
            "github" => $this->github,
            "website" => $this->url_website,
            "experience" => new ExperienceResource($this->whenLoaded('experience')),
            "skills" => SkillResource::collection($this->whenLoaded('skills')),
        ];
        // return parent::toArray($request);
    }
}
