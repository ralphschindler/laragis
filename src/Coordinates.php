<?php

namespace LaraGis;

/**
 * @property double $latitude
 * @property double $longitude
 */
class Coordinates
{
    const LATITUDE_FIRST = 'LATITUDE_FIRST';
    const LONGITUDE_FIRST = 'LONGITUDE_FIRST';

    protected $latitude;
    protected $longitude;

    public function __construct($latitude = null, $longitude = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function castToString($separator = ', ', $coordinatesOrder = self::LATITUDE_FIRST)
    {
        switch ($coordinatesOrder) {
            case self::LONGITUDE_FIRST:
                return "{$this->longitude}{$separator}{$this->latitude}";
            default:
                return "{$this->latitude}{$separator}{$this->longitude}";
        }
    }

    public function __get($name)
    {
        switch (strtolower($name)) {
            case 'latitude': return $this->latitude;
            case 'longitude': return $this->longitude;
            default: throw new \DomainException('A point property must be a longitude or latitude');
        }
    }

    public function __set($name, $value)
    {
        switch (strtolower($name)) {
            case 'latitude': $this->setLatitude($value); break;
            case 'longitude': $this->setLongitude($value); break;
            default: throw new \DomainException('A point property must be a longitude or latitude');
        }
    }

    public function __toString()
    {
        return $this->getLatitudeLongitude();
    }
}

