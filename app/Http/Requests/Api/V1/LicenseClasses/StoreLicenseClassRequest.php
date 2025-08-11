<?php

namespace App\Http\Requests\Api\V1\LicenseClasses;

use Illuminate\Foundation\Http\FormRequest;

class StoreLicenseClassRequest extends BaseLicenseClassRequest
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
            'data.attributes.className' => ['required', 'string'],
            'data.attributes.classDescription' => ['required', 'string'],
            'data.attributes.defaultValidityLength' => ['required', 'integer'],
            'data.attributes.minimumAllowedAge' => ['required', 'integer'],
            'data.attributes.classFees' => ['required', 'decimal:0,3'],
        ];
    }
}
