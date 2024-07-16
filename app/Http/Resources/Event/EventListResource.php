<?php

namespace App\Http\Resources\Event;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"          => $this->id,
            "name"        => $this->name,
            "description" => $this->description,
            "date"        => formatCarbonDate($this->date),
            "destination" => $this->destination,
        ];
    }
}
