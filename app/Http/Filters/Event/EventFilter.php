<?php

namespace App\Http\Filters\Event;

use App\Constants\DbTables;
use App\Http\Filters\QueryFilter;

class EventFilter extends QueryFilter
{
    protected $sortable = [

    ];

    public function status($status)
    {
        return $this->builder->where(sprintf("%s.status", DbTables::EVENTS), $status);
    }
}
