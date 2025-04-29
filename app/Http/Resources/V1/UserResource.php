<?php

namespace App\Http\Resources\V1;

use App\Models\TestAppointment;
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
            'included' => [
                'userInfo' => new PersonResource($this->whenLoaded('person')),
                'createdDrivers' => DriverResource::collection($this->whenLoaded('drivers')),
                'detainedLicenses' => DetainedLicenseResource::collection($this->whenLoaded('createdDetainedLicenses')),
                'createdLicense' => LicenseResource::collection($this->whenLoaded('createdLicenses')),
                'releasedDetainedLicense' => DetainedLicenseResource::collection($this->whenLoaded('releasedDetainedCards')),
                'createdTests' => TestResource::collection($this->whenLoaded('createdTests')),
                'createdTestAppointments' => TestAppointmentResource::collection($this->whenLoaded('createdTestAppointments')),
                'createdApplications' => ApplicationResource::collection($this->whenLoaded('createdApplications')),
            ],
            'links' => [
                // TODO: 'self' =>
            ]
        ];
    }
}
