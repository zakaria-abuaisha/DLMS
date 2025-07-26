<?php

namespace App\Http\Requests\Api\V1\ApplicationTypes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationTypeRequest extends BaseApplicationTypeRequest
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
            'data.attributes.title' => ['sometimes', 'string'],
            'data.attributes.description' => ['sometimes', 'string'],
            'data.attributes.applicationFees' => ['sometimes', 'decimal:0,3'],
        ];
    }
}
