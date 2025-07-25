<?php

namespace App\Http\Requests\Api\V1\Users;

class StoreUserRequest extends BaseUserRequest
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
            "data.attributes.userName" => ["required", "string", "unique:users,username"],
            "data.attributes.password" => ["required", "string", "min:6"],
            "data.attributes.isAdmin" => ["required", "boolean"],
            "data.relationships.person.data.id" => ["required", "integer", "exists:people,id"],
        ];
    }

}
