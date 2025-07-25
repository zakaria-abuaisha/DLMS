<?php

namespace App\Http\Requests\Api\V1\People;

class StorePersonRequest extends BasePersonRequest
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
            "data.attributes.nationalityNo" => ["required", "string", "unique:people,nationalityNo"],
            "data.attributes.firstName" => ["required", "string"],
            "data.attributes.lastName" => ["required", "string"],
            "data.attributes.dateOfBirth" => ["required", "date"],
            "data.attributes.sex" => ["required", "string", "in:m,f"],
            "data.attributes.address" => ["required", "string"],
            "data.attributes.phone" => ["required", "string"],
            "data.attributes.email" => ["required", "email", "unique:people,email"],
        ];
    }
}
