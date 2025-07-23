<?php

namespace App\Http\Filters\V1;

use Illuminate\Http\Request;

class UserFilter extends QueryFilter
{
    protected $sortable = [
        'userName',
        'nationalityNo',
        'firstName',
        'lastName',
        'dateOfBirth',
        'isActive',
    ];

    public function userName($value) {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder->where('userName', 'like', $likeStr);
    }

    public function firstName($value) {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder
            ->join('people', 'people.id', '=', 'users.person_id')
            ->where('firstName', 'like', $likeStr)
            ->select("users.*");
    }

    public function lastName($value) {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder
            ->join('people', 'people.id', '=', 'users.person_id')
            ->where('lastName', 'like', $likeStr)
            ->select("users.*");
    }

    public function sex($value) {
        return $this->builder
            ->join('people', 'people.id', '=', 'users.person_id')
            ->whereIn('sex', explode(',', $value))
            ->select("users.*");
    }

    public function dateOfBirth($value) {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder
                ->join('people', 'people.id', '=', 'users.person_id')
                ->whereBetween('people.dateOfBirth', $dates)
                ->select("users.*");
        }

        return $this->builder
            ->join('people', 'people.id', '=', 'users.person_id')
            ->whereDate('dateOfBirth', $value)
            ->select("users.*");
    }

    public function isActive($value) {
        return $this->builder->whereIn('is_active', explode(',', $value));
    }

    public function include($value) {
        return $this->builder->with($value);
    }
}
