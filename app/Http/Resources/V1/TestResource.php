<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'test',
            'id' => $this->id,
            'attributes' => [
                'test_appointment_id' => $this->test_appointment_id,
                'testResult' => $this->testResult,
                'notes' => $this->notes,
                'created_by_user_id' => $this->created_by_user_id,
            ],
            'included' => [
                'testAppointment' => new TestAppointmentResource($this->whenLoaded('testAppointment')),
                'createdByUser' => new UserResource($this->whenLoaded('createdByUser')),
            ],
            'links' => [
                // TODO: 'self' =>
            ]
        ];
    }
}
