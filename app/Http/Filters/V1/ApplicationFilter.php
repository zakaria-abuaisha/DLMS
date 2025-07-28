<?php

namespace App\Http\Filters\V1;

use Illuminate\Http\Request;

class ApplicationFilter extends QueryFilter
{

    protected $sortable = [
        'userName' => 'users:created_by_user_id,id',
        'nationalityNo' => 'people:person_id,id',
        'firstName' => 'people:person_id,id',
        'lastName' => 'people:person_id,id',
        'dateOfBirth' => 'people:person_id,id',
        'applicationStatus' => 'self',
        'created_at' => 'self',
    ];

    public function userName($value) {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder
            ->join('users', 'users.id', '=', 'applications.created_by_user_id')
            ->where('userName', 'like', $likeStr);
    }

    public function nationalityNo($value) {
        $likeStr = str_replace('*', '%', $value);

        return $this->builder
            ->join('people', 'people.id', '=', 'applications.applicant_person_id')
            ->where('nationalityNo', 'like', $likeStr);
    }

    public function firstName($value) {
        $likeStr = str_replace('*', '%', $value);

        return $this->builder
            ->join('people', 'people.id', '=', 'applications.applicant_person_id')
            ->where('firstName', 'like', $likeStr);
    }

    public function lastName($value) {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder
            ->join('people', 'people.id', '=', 'applications.applicant_person_id')
            ->where('lastName', 'like', $likeStr);
    }

    public function sex($value) {
        return $this->builder
            ->join('people', 'people.id', '=', 'applications.applicant_person_id')
            ->whereIn('sex', explode(',', $value));
    }

    public function status($value) {
        return $this->builder
            ->whereIn('applicationStatus', explode(',', $value));
    }

    public function dateOfBirth($value) {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder
                ->join('people', 'people.id', '=', 'applications.applicant_person_id')
                ->whereBetween('people.dateOfBirth', $dates);
        }

        return $this->builder
            ->join('people', 'people.id', '=', 'applications.applicant_person_id')
            ->whereDate('dateOfBirth', $value);
    }

    public function createdAt($value) {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder
                ->whereBetween('created_at', $dates);
        }

        return $this->builder
            ->whereDate('created_at', $value);
    }

    public function applicationType($value)
    {
        return $this->builder
            ->where('application_type_id', $value);
    }

}
