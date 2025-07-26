<?php

namespace App\Http\Filters\V1;

use Illuminate\Http\Request;

class UserFilter extends QueryFilter
{

    protected $sortable = [
        'userName' => 'self',
        'nationalityNo' => 'people:person_id,id',
        'firstName' => 'people:person_id,id',
        'lastName' => 'people:person_id,id',
        'dateOfBirth' => 'people:person_id,id',
        'isActive' => 'self',
    ];

    public function userName($value) {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder->where('userName', 'like', $likeStr);
    }

    public function firstName($value) {
        $likeStr = str_replace('*', '%', $value);

        return $this->builder
            ->join('people', 'people.id', '=', 'users.person_id')
            ->where('firstName', 'like', $likeStr);
    }

    public function lastName($value) {
        $likeStr = str_replace('*', '%', $value);
        return $this->builder
            ->join('people', 'people.id', '=', 'users.person_id')
            ->where('lastName', 'like', $likeStr);
    }

    public function sex($value) {
        return $this->builder
            ->join('people', 'people.id', '=', 'users.person_id')
            ->whereIn('sex', explode(',', $value));
    }

    public function dateOfBirth($value) {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder
                ->join('people', 'people.id', '=', 'users.person_id')
                ->whereBetween('people.dateOfBirth', $dates);
        }

        return $this->builder
            ->join('people', 'people.id', '=', 'users.person_id')
            ->whereDate('dateOfBirth', $value);
    }

    public function isActive($value) {
        return $this->builder->whereIn('is_active', $value);
    }

}
