<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'applicationType',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'applicationFees' => $this->applicationFees,
            ],
            'included' => [
                'applications' => ApplicationResource::collection($this->whenLoaded('applications')),
            ],
            'links' => [
                // TODO: 'self' =>
            ]
        ];

    }
}
