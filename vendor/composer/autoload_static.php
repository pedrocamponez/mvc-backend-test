<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit307f98ef297515b3d63e2e9043d8f808
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit307f98ef297515b3d63e2e9043d8f808::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit307f98ef297515b3d63e2e9043d8f808::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit307f98ef297515b3d63e2e9043d8f808::$classMap;

        }, null, ClassLoader::class);
    }
}