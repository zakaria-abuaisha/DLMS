<?php

namespace App\Http\Requests\Api\V1\LicenseClasses;

use Illuminate\Foundation\Http\FormRequest;

class BaseLicenseClassRequest extends FormRequest
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
                'data.attributes.className' => 'className',
                'data.attributes.classDescription' => 'classDescription',
                'data.attributes.minimumAllowedAge' => 'minimumAllowedAge',
                'data.attributes.classFees' => 'classFees',
                'data.attributes.defaultValidityLength' => 'defaultValidityLength',
            ],
            $otherAttributes);

        $attributesToUpdate = [];
        foreach ($attributeMap as $key => $attribute) {
            if($this->has($key))
            {
                $value = $this->input($key);
                $attributesToUpdate[$attribute] = $value;            }
        }

        return $attributesToUpdate;
    }
}
