<?php

namespace App\Http\Requests\Api\V1\ApplicationTypes;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationTypeRequest extends BaseApplicationTypeRequest
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
            'data.attributes.title' => ['required', 'string'],
            'data.attributes.description' => ['nullable', 'string'],
            'data.attributes.applicationFees' => ['required', 'decimal:0,3'],
        ];
    }
}
