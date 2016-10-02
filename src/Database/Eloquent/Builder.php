<?php

namespace LaraGis\Database\Eloquent;

use Illuminate\Database\Eloquent\Builder as BaseBuilder;

class Builder extends BaseBuilder
{
    public function get($columns = ['*'])
    {
        $model = $this->getModel();
        $casts = $model->getCasts();
        $connection = $model->getConnection();

        foreach ($casts as $column => $type) {
            if (substr($type, 0, 7) === 'laragis') {
                $columns[] = $connection->raw("ST_AsGeoJSON($column) as $column");
            }
        }

        return parent::get($columns);
    }

    /*
    public function update(array $values)
    {
        foreach ($values as $key => &$value) {
            if ($value instanceof GeometryInterface) {
                $value = $this->asWKT($value);
            }
        }
        return parent::update($values);
    }
    */

    /*
    protected function getSpatialFields()
    {
        return $this->getModel()->getSpatialFields();
    }
    */

}

