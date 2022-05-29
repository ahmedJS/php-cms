<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit26cb902ffe58ecf10e7fbf8f7f7b8e06
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CMSApp\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CMSApp\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit26cb902ffe58ecf10e7fbf8f7f7b8e06::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit26cb902ffe58ecf10e7fbf8f7f7b8e06::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit26cb902ffe58ecf10e7fbf8f7f7b8e06::$classMap;

        }, null, ClassLoader::class);
    }
}
