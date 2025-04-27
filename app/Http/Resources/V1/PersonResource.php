<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'person',
            'id' => $this->id,
            'attributes' => [
                'nationalityNo' => $this->nationalityNo,
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'dateOfBirth' => $this->dateOfBirth,
                'sex' => $this->sex,
                'address' => $this->address,
                'phone' => $this->phone,
                'email' => $this->email,
                'imagePath' => $this->imagePath,
            ],
            'included' => [
                'user' => new UserResource($this->whenLoaded('user')),
                // driver
            ],
            'relationships' => [
                //TODO: applications
            ],
            'links' => [
                // TODO: 'self' =>
            ]
        ];
    }
}
