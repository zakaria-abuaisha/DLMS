<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class BaseUserRequest extends FormRequest
{
    public function mappedAttributes(array $otherAttributes = []): array
    {
        $attributeMap = array_merge(
            [
                'data.attributes.nationalityNo' => 'nationalityNo',
                'data.attributes.firstName' => 'firstName',
                'data.attributes.lastName' => 'lastName',
                'data.attributes.dateOfBirth' => 'dateOfBirth',
                'data.attributes.sex' => 'sex',
                'data.attributes.address' => 'address',
                'data.attributes.phone' => 'phone',
                'data.attributes.email' => 'email',
                'data.attributes.userName' => 'userName',
                'data.attributes.password' => 'password',
                'data.attributes.isAdmin' => 'isAdmin',
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
