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
                // TODO
            ],
            'relationships' => [
                //TODO:
            ],
            'links' => [
                // TODO:
            ]
        ];
    }
}
