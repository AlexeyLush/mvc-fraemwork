<?php


namespace App\Framework\Application;


class Filesystem
{

    static function path($path = null) {

        $root = dirname(getcwd());
        $path = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $path);
        $path = trim($path);
        $path = trim($path, DIRECTORY_SEPARATOR);

        return trim($root . DIRECTORY_SEPARATOR . $path, DIRECTORY_SEPARATOR);
    }

    static function configPath($name = null) {

        if (!$name)
            return static::path('config');

        return static::path("config/{$name}.php");
    }

    static function exists($path) {
        return file_exists($path) || file_exists(static::path($path));
    }

}
