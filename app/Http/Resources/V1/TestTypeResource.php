<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'testType',
            'id' => $this->id,
            'attributes' => [
                'testTypeTitle' => $this->testTypeTitle,
                'testTypeDescription' => $this->testTypeDescription,
                'textTypeFees' => $this->textTypeFees,
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
