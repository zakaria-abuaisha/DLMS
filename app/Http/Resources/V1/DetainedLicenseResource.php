<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetainedLicenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'detainedLicense',
            'id' => $this->id,
            'attributes' => [
                'license_id' => $this->license_id,
                'detainDate' => $this->detainDate,
                'fineFees' => $this->fineFees,
                'created_by_user_id' => $this->created_by_user_id,
                'isReleased' => $this->isReleased,
                'releaseDate' => $this->releaseDate,
                'released_by_user_id' => $this->released_by_user_id,
                'release_application_id' => $this->release_application_id,
            ],
            'relationships' => [
                // TODO:
            ],
            'included' => [
                // TODO:
            ],
            'links' => [
                // TODO: 'self' =>
            ]
        ];
    }
}
