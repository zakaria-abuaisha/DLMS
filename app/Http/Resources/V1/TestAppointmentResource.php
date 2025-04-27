<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestAppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'testAppointment',
            'id' => $this->id,
            'attributes' => [
                'test_type_id' => $this->test_type_id,
                'Local_dl_application_id' => $this->Local_dl_application_id,
                'appointmentDate' => $this->appointmentDate,
                'paidFees' => $this->paidFees,
                'created_by_user_id' => $this->created_by_user_id,
                'isLocked' => $this->isLocked,
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
