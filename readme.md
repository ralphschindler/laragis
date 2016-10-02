# LaraGis

LaraGis provides geospatial database and Eloquent features to Laravel.

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