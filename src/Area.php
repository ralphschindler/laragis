<?php

namespace LaraGis;

class Area
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

    public function __toString()
    {
        $strs = [];
        foreach ($this->coordinatesSet as $coordinates) {
            $strs[] = (string) $coordinates;
        }
        return '[' . implode(' -> ', $strs) . ']';
    }
}

