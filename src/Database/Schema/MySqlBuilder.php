<?php


namespace LaraGis\Database\Schema;

use Illuminate\Database\Schema\MySqlBuilder as BaseMySqlBuilder;

class MySqlBuilder extends BaseMySqlBuilder
{
    protected function createBlueprint($table, \Closure $callback = null)
    {
        return new Blueprint($table, $callback);
    }
}

