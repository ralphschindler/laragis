<?php

namespace LaraGis\Database\Schema\Grammar;

use Illuminate\Database\Schema\Grammars\MySqlGrammar as BaseMySqlGrammar;
use Illuminate\Support\Fluent;

class MySqlGrammar extends BaseMySqlGrammar
{
    public function typePoint(Fluent $column)
    {
        return 'POINT';
    }

    public function typePolygon(Fluent $column)
    {
        return 'POLYGON';
    }
}

