<?php

namespace App\Http\Filters\V1;

use Illuminate\Http\Request;

class LicenseFilter extends QueryFilter
{

    protected $sortable = [
        'dateOfBirth' => 'people:person_id,id',
        'userName' => 'users:created_by_user_id,id',
        'className' => 'license_classes:license_class_id,id',
        'expirationDate' => 'self',
        'issueDate' => 'self',
        'isActive' => 'self',
    ];

    public function userName($value) {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder
            ->join('users', 'users.id', '=', 'licenses.created_by_user_id')
            ->where('userName', 'like', $likeStr);
    }

    public function firstName($value) {
        $likeStr = str_replace('*', '%', $value);

        return $this->builder
            ->join('drivers', 'drivers.id', '=', 'licenses.driver_id')
            ->join('people', 'people.id', '=', 'drivers.person_id')
            ->where('firstName', 'like', $likeStr);
    }

    public function lastName($value) {
        $likeStr = str_replace('*', '%', $value);

        return $this->builder
            ->join('drivers', 'drivers.id', '=', 'licenses.driver_id')
            ->join('people', 'people.id', '=', 'drivers.person_id')
            ->where('firstName', 'like', $likeStr);
    }

    public function sex($value) {
        return $this->builder
            ->join('drivers', 'drivers.id', '=', 'licenses.driver_id')
            ->join('people', 'people.id', '=', 'drivers.person_id')
            ->whereIn('sex', explode(',', $value));
    }

    public function issueReason($value) {
        return $this->builder
            ->whereIn('issueReason', explode(',', $value));
    }

    public function dateOfBirth($value) {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder
                ->join('drivers', 'drivers.id', '=', 'licenses.driver_id')
                ->join('people', 'people.id', '=', 'drivers.person_id')
                ->whereBetween('people.dateOfBirth', $dates);
        }

        return $this->builder
            ->join('drivers', 'drivers.id', '=', 'licenses.driver_id')
            ->join('people', 'people.id', '=', 'drivers.person_id')
            ->whereDate('dateOfBirth', $value);
    }

    public function expirationDate($value) {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder
                ->whereBetween('expirationDate', $dates);
        }

        return $this->builder
            ->whereDate('expirationDate', $value);
    }

    public function issueDate($value) {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder
                ->whereBetween('issueDate', $dates);
        }

        return $this->builder
            ->whereDate('issueDate', $value);
    }

    public function licenseClass($value)
    {
        return $this->builder
            ->where('license_class_id', $value);
    }

}
