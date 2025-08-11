<?php

namespace App\Http\Requests\Api\V1\TestTypes;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestTypeRequest extends BaseTestTypeRequest
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
            'data.attributes.testTypeTitle' => ['required', 'string'],
            'data.attributes.testTypeDescription' => ['required', 'string'],
            'data.attributes.testTypeFees' => ['required', 'decimal:0.3'],
        ];
    }
}
