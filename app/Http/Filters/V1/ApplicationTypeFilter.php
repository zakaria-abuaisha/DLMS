<?php

namespace App\Http\Filters\V1;

use Illuminate\Http\Request;

class ApplicationTypeFilter extends QueryFilter
{

    protected $sortable = [
        'title' => 'self',
        'applicationFees' => 'self',
    ];

    public function title($value) {
        $likeStr = str_replace('*', '%', $value);

        return $this->builder
            ->where('title', 'like', $likeStr);
    }

}
