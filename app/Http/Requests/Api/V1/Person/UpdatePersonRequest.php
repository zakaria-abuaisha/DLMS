<?php

namespace App\Http\Requests\Api\V1\Person;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends BasePersonRequest
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
            "data.attributes.nationalityNo" => ["prohibited"],
            "data.attributes.firstName" => ["sometimes", "string"],
            "data.attributes.lastName" => ["sometimes", "string"],
            "data.attributes.dateOfBirth" => ["sometimes", "date"],
            "data.attributes.sex" => ["sometimes", "string", "in:m,f"],
            "data.attributes.address" => ["sometimes", "string"],
            "data.attributes.phone" => ["sometimes", "string"],
            "data.attributes.email" => ["prohibited"],
        ];
    }
}
