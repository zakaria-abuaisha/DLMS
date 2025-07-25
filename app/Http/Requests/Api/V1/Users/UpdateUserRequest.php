<?php

namespace App\Http\Requests\Api\V1\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends BaseUserRequest
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
            "data.attributes.userName" => ["prohibited"],
            "data.attributes.password" => ["sometimes", "string", "min:6"],
            "data.attributes.isAdmin" => ["sometimes", "boolean"],
            "data.relationships.person.data.id" => ["prohibited"]
        ];
    }
}
