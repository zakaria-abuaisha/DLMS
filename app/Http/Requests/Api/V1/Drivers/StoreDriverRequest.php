<?php

namespace App\Http\Requests\Api\V1\Drivers;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDriverRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function mappedAttributes(array $otherAttributes = []): array
    {

        $attributeMap = array_merge(
            [
                'data.relationships.person.data.id' => 'person_id',
                'data.relationships.user.data.id' => 'created_by_user_id'
            ]
            , $otherAttributes);

        $attributesToUpdate = [];
        foreach ($attributeMap as $key => $attribute) {
            if ($this->has($key)) {
                $value = $this->input($key);
                $attributesToUpdate[$attribute] = $value;
            }
        }
        return $attributesToUpdate;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {


        return [
            'data.relationships.person.data.id' => ["required", 'integer', 'unique:drivers,person_id', 'exists:people,id'],
            'data.relationships.user.data.id' => [
                "required",
                'integer',
                'exists:users,id',
                Rule::exists('users', 'id')->where('isActive', 1),],
            ];
    }
}
