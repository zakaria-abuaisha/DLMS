<?php

namespace App\Http\Requests\Api\V1\TestTypes;

use Illuminate\Foundation\Http\FormRequest;

class BaseTestTypeRequest extends FormRequest
{
    public function mappedAttributes(array $otherAttributes = [])
    {
        $attributes = array_merge([
            'data.attributes.testTypeTitle' => 'testTypeTitle',
            'data.attributes.testTypeDescription' => 'testTypeDescription',
            'data.attributes.testTypeFees' => 'testTypeFees',
        ], $otherAttributes);

        $attributesToUpdate = [];
        foreach ($attributes as $key => $attribute) {
            if ($this->has($key)) {
                $value = $this->input($key);
                $attributesToUpdate[$attribute] = $value;
            }
        }

        return $attributesToUpdate;
    }
}
