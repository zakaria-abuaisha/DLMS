<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

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
            "nationalityNo" => ["required", "string"],
            "firstName" => ["required", "string"],
            "lastName" => ["required", "string"],
            "dateOfBirth" => ["required", "date", "date_format:Y-m-d"],
            "sex" => ["required", "string"],
            "address" => ["required", "string"],
            "phone" => ["required", "string"],
            "email" => ["required", "email", "unique:users"],
            "userName" => ["required", "string", "unique:users"],
            "password" => ["required", "string", "min:6"],
            "isAdmin" => ["required", "boolean"],
            "personImage" => ["nullable", "image", "mimes:jpeg,png,jpg,svg", "max:2048"],
        ];
    }
}
