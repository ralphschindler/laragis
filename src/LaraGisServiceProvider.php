<?php

namespace LaraGis;

use Illuminate\Database\DatabaseManager;
use Illuminate\Support\ServiceProvider;

class LaraGisServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->app->resolving('db', function (DatabaseManager $dbManager) {
                $extender = function ($config, $name) {
                    $mysqlConnection = $this->factory->make($config, $name);
                    return new Database\MySqlConnection($mysqlConnection);
                };

                $dbManager->extend('mysql', $extender->bindTo($dbManager, get_class($dbManager)));
                return $dbManager;
            });
        }
    }
}
