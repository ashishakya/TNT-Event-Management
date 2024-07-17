<?php

namespace App\Builders;

use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class EventBuilder extends Builder
{
    public function filter(QueryFilter $filters): Builder
    {
        return $filters->apply($this);
    }
}
