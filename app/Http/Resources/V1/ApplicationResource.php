<?php

namespace App\Http\Resources\V1;

use App\Models\ApplicationType;
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
                'application_type_id' => $this->application_type_id,
                'applicationStatus' => $this->applicationStatus,
                'created_by_user_id' => $this->created_by_user_id,
                'paidFees' => $this->paidFees,
                'created_at' => $this->created_at,
            ],
            'included' => [
                'applicantInfo' => new PersonResource($this->whenLoaded('applicantPerson')),
                'applicationType' => new ApplicationTypeResource($this->whenLoaded('applicationType')),
                'createdByUser' => new UserResource($this->whenLoaded('createdByUser')),

            ],
            'links' => [
                // TODO: 'self' =>
            ]
        ];
    }
}
