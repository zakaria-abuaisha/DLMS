<?php

namespace App\Http\Requests\Api\V1\Users;

use Illuminate\Foundation\Http\FormRequest;

class BaseUserRequest extends FormRequest
{
    public function mappedAttributes(array $otherAttributes = []): array
    {

        $attributeMap = array_merge(
            [
                'data.attributes.userName' => 'userName',
                'data.attributes.password' => 'password',
                'data.attributes.isAdmin' => 'isAdmin',
                'data.relationships.person.data.id' => 'person_id',
            ]
        , $otherAttributes);

        $attributesToUpdate = [];
        foreach ($attributeMap as $key => $attribute) {
            if ($this->has($key)) {
                $value = $this->input($key);

                if($attribute === 'password')
                {
                    $value = bcrypt($value);
                }
                $attributesToUpdate[$attribute] = $value;
            }
        }

        return $attributesToUpdate;
    }
}
