# LaraGis

LaraGis provides geospatial database and Eloquent features to Laravel.

Features:

- Simple Entity API, for use in casting model properties
- Fast serialization of geospatial data from MySql (not PHP userland) via `ST_AsGeoJSON()`

## Installation

To get started with Socialite, add to your `composer.json` file as a dependency:

    composer require ralphschindler/laragis

### Configuration

After installing the Socialite library, register the `LaraGis\LaraGisProvider` in your `config/app.php` configuration file:

```php
'providers' => [
    // Other service providers...

    LaraGis\LaraGisProvider::class,
],
```

## Basic Usage

To use in `Eloquent` based models, use the `LaraGisTrait`, and specify a column to be cast into a geospatial datatype with the `laragis` key in the $casts array:

```php
class Place extends Model
{
    use LaraGisTrait;

    protected $table = 'places';

    protected $casts = [
        'coordinates' => 'laragis'
    ];
}
```

```php
$place = App\Places::find(1);
$coordinates = $place->coordinates;
echo $coordinates->getLatitudeLongitude(); // "30, -90"
```

## Entity API

```php

/**
 * @property double $latitude
 * @property double $longitude
 */
class Coordinates {
    public function __construct($latitude = null, $longitude = null);
    public function setLatitude($latitude);
    public function getLatitude();
    public function setLongitude($longitude);
    public function getLongitude();
    public function castToString($separator, $coordinatesOrder = self::LATITUDE_FIRST)
}

class Area implements \IteratorAggregate, \Countable {
    public function addCoordinates(Coordinates $coordinates);
    public function getCoordinates();
}
```