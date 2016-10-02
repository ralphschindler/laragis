<?php

namespace LaraGis\Database\Schema;

use Illuminate\Database\Schema\Blueprint as BaseBlueprint;

class Blueprint extends BaseBlueprint
{
    public function point($column)
    {
        return $this->addColumn('point', $column);
    }

    public function polygon($column)
    {
        return $this->addColumn('polygon', $column);
    }
}
