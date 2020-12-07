<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'location' => $this->location,
            'details' => $this->details,
            'investment' => $this->investment,
            'budget' => $this->budget,
            'materials' => MaterialResource::collection(collect($this->materials))
        ];
    }
}
