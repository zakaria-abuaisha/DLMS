<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'driver',
            'id' => $this->id,
            'attributes' => [
                'person_id' => $this->person_id,
                'created_by_user_id' => $this->created_by_user_id,
                'createdDate' => $this->isActive,
            ],
            'included' => [
                'driverInfo' => new PersonResource($this->whenLoaded('person')),
                'createdByUser' => new UserResource($this->whenLoaded('createdByUser')),
                'license' => new LicenseResource($this->whenLoaded('licenses')),
            ],
            'links' => [
                // TODO:
            ]
        ];
    }
}
