<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'application',
            'id' => $this->id,
            'attributes' => [
                'applicant_person_id' => $this->applicant_person_id,
                'applicationDate' => $this->applicationDate,
                'application_type_id' => $this->application_type_id,
                'applicationStatus' => $this->applicationStatus,
                'lastStatusDate' => $this->lastStatusDate,
                'paidFees' => $this->paidFees,
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
