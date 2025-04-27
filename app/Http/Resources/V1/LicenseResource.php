<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LicenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'license',
            'id' => $this->id,
            'attributes' => [
                'application_id' => $this->application_id,
                'driver_id' => $this->driver_id,
                'license_class_id' => $this->license_class_id,
                'issueDate' => $this->issueDate,
                'expirationDate' => $this->expirationDate,
                'notes' => $this->notes,
                'paidFees' => $this->paidFees,
                'isActive' => $this->isActive,
                'created_by_user_id' => $this->created_by_user_id,
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
