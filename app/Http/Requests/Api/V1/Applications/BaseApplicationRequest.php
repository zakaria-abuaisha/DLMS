<?php

namespace App\Http\Requests\Api\V1\Applications;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BaseApplicationRequest extends FormRequest
{
    public function mappedAttributes(array $otherAttributes = []): array
    {

        $attributeMap = array_merge(
            [
                'data.attributes.applicationStatus' => 'applicationStatus',
                'data.attributes.paidFees' => 'paidFees',
                'data.relationships.person.id' => 'applicant_person_id',
                'data.relationships.applicationType.id' => 'application_type_id',
            ]
            , $otherAttributes);

        $attributesToUpdate = [];
        foreach ($attributeMap as $key => $attribute) {
            if ($this->has($key)) {
                $value = $this->input($key);


                $attributesToUpdate[$attribute] = $value;
            }
        }
        $attributesToUpdate['created_by_user_id'] = Auth::user()->id;
        return $attributesToUpdate;
    }
}
