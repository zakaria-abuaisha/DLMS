<?php

namespace App\Http\Requests\Api\V1\Licenses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLicenseRequest extends BaseLicenseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'data.attributes.paidFees' => ['sometimes', 'decimal:0,3'],
            'data.attributes.notes' => ['sometimes', 'string'],
            'data.relationships.application.id' => ['prohibited'],
            'data.relationships.driver.id' => ['prohibited'],
            'data.relationships.licenseClass.id' => ['prohibited']
        ];
    }
}
