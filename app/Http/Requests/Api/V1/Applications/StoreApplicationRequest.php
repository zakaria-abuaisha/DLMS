<?php

namespace App\Http\Requests\Api\V1\Applications;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends BaseApplicationRequest
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
            'data.attributes.paidFees' => ['required', 'decimal:0,3'],
            'data.relationships.person.id' => ['required', 'exists:people,id'],
            'data.relationships.applicationType.id' => ['required', 'exists:application_types,id'],
        ];
    }
}
