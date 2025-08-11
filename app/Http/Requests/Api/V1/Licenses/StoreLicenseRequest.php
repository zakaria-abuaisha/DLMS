<?php

namespace App\Http\Requests\Api\V1\Licenses;


use App\Models\Application;
use App\Models\Driver;

class StoreLicenseRequest extends BaseLicenseRequest
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
            'data.attributes.paidFees' => ['required', 'decimal:0,3'],
            'data.attributes.notes' => ['nullable', 'string'],
            'data.attributes.issueReason' => ['required', 'string', 'in:F,D,RN,RT,M'],
            'data.relationships.application.id' => ['required', 'integer', 'exists:applications,id'],
            'data.relationships.driver.id' => ['required', 'integer', 'exists:drivers,id'],
            'data.relationships.licenseClass.id' => ['required', 'integer', 'exists:license_classes,id'],
        ];
    }

    public function withValidator($validator) {
        $validator->after(function ($validator) {
            if(!$validator->errors()->isEmpty())
                return;

           $application = Application::findOrFail($this->input('data.relationships.application.id'));
           $driver = Driver::findOrFail($this->input('data.relationships.driver.id'));

           if($driver->person->id != $application->applicant_person_id)
           {
               $validator->errors()->add(
                   'data.relationships.driver.id',
                   'This Application Does Not Belong To This Driver.'
               );
           }
           else if($application->applicationStatus != 'C')
           {
               $validator->errors()->add(
                   'data.relationships.application.id',
                   'The Application Must Be Completed.'
               );
           }
        });
    }
}
