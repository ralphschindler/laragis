<?php

namespace LaraGis;

use Traversable;

class Area implements \IteratorAggregate, \Countable
{
    /** @var Coordinates[] */
    protected $coordinatesSet = [];

    public function addCoordinates(Coordinates $coordinates)
    {
        $this->coordinatesSet[] = $coordinates;
    }

    public function getCoordinatesSet()
    {
        return $this->coordinatesSet;
    }

    public function castToString($separator, $coordinatesSeparator = ', ', $coordinatesOrder = Coordinates::LATITUDE_FIRST)
    {

    }

    public function __toString()
    {
        $strs = [];
        foreach ($this->coordinatesSet as $coordinates) {
            $strs[] = (string) $coordinates;
        }
        return '[' . implode(' -> ', $strs) . ']';
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->coordinatesSet);
    }

    public function count()
    {
        return count($this->coordinatesSet);
    }
}

