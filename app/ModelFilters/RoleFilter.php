<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class RoleFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function name($name)
    {
        return $this->where('name', 'iLIKE', "%$name%");
    }

    public function application($application)
    {
      return $this->whereHas('application', function($query) use ($application) {
        $query->where('name', 'iLIKE', "%$application%");
      });
    }
}
