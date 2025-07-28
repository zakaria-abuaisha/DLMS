<?php

namespace App\Http\Requests\Api\V1\Applications;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicationRequest extends BaseApplicationRequest
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
            'data.attributes.applicationStatus' => ['sometimes', 'string', 'in:P,X,C'],
            'data.attributes.paidFees' => ['sometimes', 'decimal:0,3'],
            'data.relationships.person.id' => ['sometimes', 'exists:people,id'],
            'data.relationships.user.id' => ['sometimes', 'exists:users,id'],
            'data.relationships.applicationType.id' => ['sometimes', 'exists:application_types,id'],
        ];
    }
}
