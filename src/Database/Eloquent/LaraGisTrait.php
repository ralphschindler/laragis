<?php

namespace LaraGis\Database\Eloquent;

use LaraGis\Coordinates;
use LaraGis\Area;

trait LaraGisTrait
{
    public function newEloquentBuilder($query)
    {
        return new Builder($query);
    }

    protected function castAttribute($key, $value)
    {
        $type = $this->getCastType($key);
        if (substr($type, 0, 7) === 'laragis') {
            $geoJson = json_decode($value, true);
            switch ($geoJson['type']) {
                case 'Polygon':
                    $polygon = new Area();
                    foreach ($geoJson['coordinates'][0] as $coordinate) {
                        $polygon->addCoordinates(new Coordinates($coordinate[0], $coordinate[1]));
                    }
                    return $polygon;
                case 'Point':
                    return new Coordinates($geoJson['coordinates'][0], $geoJson['coordinates'][1]);
            }
        }

        return parent::castAttribute($key, $value);
    }
}