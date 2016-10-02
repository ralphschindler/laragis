<?php

namespace LaraGis;

/**
 * @property double $latitude
 * @property double $longitude
 */
class Coordinates
{
    protected $latitude;
    protected $longitude;

    public function __construct($latitude = null, $longitude = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function __get($name)
    {
        switch (strtolower($name)) {
            case 'latitude': return $this->latitude;
            case 'longitude': return $this->longitude;
            default: throw new \DomainException('A point property must be a longitude or latitude');
        }
    }

    public function __toString()
    {
        return "$this->latitude, $this->longitude";
    }
}

