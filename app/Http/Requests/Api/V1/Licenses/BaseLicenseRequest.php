<?php

namespace App\Http\Requests\Api\V1\Licenses;

use App\Models\Driver;
use App\Models\LicenseClass;
use App\Models\TestAppointment;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BaseLicenseRequest extends FormRequest
{
    public function mappedAttributes(array $otherAttributes = []): array
    {

        $attributeMap = array_merge(
            [
                'data.attributes.paidFees' => 'paidFees',
                'data.attributes.notes' => 'notes',
                'data.attributes.issueReason' => 'issueReason',
                'data.relationships.application.id' => 'application_id',
                'data.relationships.driver.id' => 'driver_id',
                'data.relationships.licenseClass.id' => 'license_class_id',
            ]
            , $otherAttributes);

        $attributesToUpdate = [];
        foreach ($attributeMap as $key => $attribute) {
            if ($this->has($key)) {
                $value = $this->input($key);
                $attributesToUpdate[$attribute] = $value;
            }
        }

        if(get_called_class() == StoreLicenseRequest::class)
        {
            $licenseClass = LicenseClass::find($attributesToUpdate['license_class_id']);
            $attributesToUpdate['expirationDate'] = Carbon::now()->addYears($licenseClass->defaultValidityLength);
            $attributesToUpdate['issueDate'] = Carbon::now()->toDateString();
            $attributesToUpdate['created_by_user_id'] = Auth::user()->id;
        }

        return $attributesToUpdate;
    }


}
