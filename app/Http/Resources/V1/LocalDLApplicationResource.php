<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocalDLApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'localDrivingLicenseApplication',
            'id' => $this->id,
            'attributes' => [
                'application_id' => $this->application_id,
                'license_class_id' => $this->license_class_id,
            ],
            'included' => [
                'application' => new ApplicationResource($this->whenLoaded('application')),
                'licenseClass' => new LicenseClassResource($this->whenLoaded('licenseClass')),
            ],
            'links' => [
                // TODO: 'self' =>
            ]
        ];

    }
}
