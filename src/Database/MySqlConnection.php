<?php


namespace LaraGis\Database;

use Illuminate\Database\MySqlConnection as BaseMySqlConnection;

class MySqlConnection extends BaseMySqlConnection
{
    protected $proxiedConnection = null;

    public function __construct(BaseMySqlConnection $connection)
    {
        // extension through proxy
        $this->proxiedConnection = $connection;
        foreach (get_object_vars($connection) as $name => $value) {
            $this->{$name} = &$this->proxiedConnection->{$name};
        }
        $this->schemaGrammar = new Schema\Grammar\MySqlGrammar;
    }

    public function getSchemaBuilder()
    {
        return new Schema\MySqlBuilder($this);
    }
}
