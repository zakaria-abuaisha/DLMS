<?php

namespace App\Http\Filters\V1;

use Illuminate\Http\Request;

class DriverFilter extends QueryFilter
{

    protected $sortable = [
        'nationalityNo' => 'people:person_id,id',
        'firstName' => 'people:person_id,id',
        'lastName' => 'people:person_id,id',
        'dateOfBirth' => 'people:person_id,id',
    ];

    public function firstName($value) {
        $likeStr = str_replace('*', '%', $value);

        return $this->builder
            ->join('people', 'people.id', '=', 'drivers.person_id')
            ->where('firstName', 'like', $likeStr);
    }

    public function lastName($value) {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder
            ->join('people', 'people.id', '=', 'drivers.person_id')
            ->where('lastName', 'like', $likeStr);
    }

    public function sex($value) {
        return $this->builder
            ->join('people', 'people.id', '=', 'drivers.person_id')
            ->whereIn('sex', $value);
    }

    public function dateOfBirth($value) {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder
                ->join('people', 'people.id', '=', 'drivers.person_id')
                ->whereBetween('people.dateOfBirth', $dates);
        }

        return $this->builder
            ->join('people', 'people.id', '=', 'drivers.person_id')
            ->whereDate('dateOfBirth', $value);
    }

}
