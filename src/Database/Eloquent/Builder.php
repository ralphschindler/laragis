<?php

namespace LaraGis\Database\Eloquent;

use Illuminate\Database\Eloquent\Builder as BaseBuilder;
use LaraGis\Coordinates;

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

    public function update(array $values)
    {
        foreach ($values as $key => $value) {
            $model = $this->getModel();
            $casts = $model->getCasts();
            $connection = $model->getConnection();

            foreach ($casts as $column => $type) {
                // @todo Additional checking on cast type
                if (substr($type, 0, 7) === 'laragis') {
                    switch (true) {
                        case ($value instanceof Coordinates);
                            $values[$key] = $connection->raw("ST_ToWKF(POINT({$value->getLatitudeLongitude(' ')}))");
                            break;
                        case ($value instanceof Area):

                            break;
                    }
                }
            }
        }
        return parent::update($values);
    }

}

