<?php

namespace App\Http\Requests\Api\V1\LicenseClasses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLicenseClassRequest extends BaseLicenseClassRequest
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
            'data.attributes.className' => ['sometimes', 'string'],
            'data.attributes.classDescription' => ['sometimes', 'string'],
            'data.attributes.defaultValidityLength' => ['sometimes', 'integer'],
            'data.attributes.minimumAllowedAge' => ['sometimes', 'integer'],
            'data.attributes.classFees' => ['sometimes', 'decimal:0,3'],
        ];
    }
}
