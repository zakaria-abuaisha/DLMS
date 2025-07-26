<?php

namespace App\Http\Requests\Api\V1\ApplicationTypes;

use Illuminate\Foundation\Http\FormRequest;

class BaseApplicationTypeRequest extends FormRequest
{
    public function mappedAttributes(array $otherAttributes = []): array
    {

        $attributeMap = array_merge(
            [
                'data.attributes.title' => 'title',
                'data.attributes.description' => 'description',
                'data.attributes.applicationFees' => 'applicationFees',
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
}
