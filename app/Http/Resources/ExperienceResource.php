<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
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
			"start_date" => $this->start_date,
			"end_date" => $this->end_date,
			"job" => $this->job,
			"title" => $this->title,
            "slug" => $this->slug,
			"description" => $this->description,
			"isTraining" => $this->isTraining,
			"projects" => ProjectResource::collection($this->whenLoaded('projects')),
			"business" => new BusinessResource($this->whenLoaded('business')),
        ];
    }
}
