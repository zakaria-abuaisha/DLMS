<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'user',
            'id' => $this->id,
            'attributes' => [
                'person_id' => $this->person_id,
                'userName' => $this->userName,
                'isActive' => $this->isActive,
            ],
            'relationships' => [

            ],
            'included' => [
                'userInfo' => new PersonResource($this->whenLoaded('person')),

            ],
            'links' => [
                // TODO: 'self' =>
            ]
        ];
    }
}
