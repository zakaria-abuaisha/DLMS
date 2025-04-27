<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LicenseClassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'licenseClass',
            'id' => $this->id,
            'attributes' => [
                'className' => $this->className,
                'classDescription' => $this->classDescription,
                'minimumAllowedAge' => $this->minimumAllowedAge,
                'defaultValidityLength' => $this->defaultValidityLength,
                'classFees' => $this->classFees
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
