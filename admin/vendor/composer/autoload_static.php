<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1debac9205d2d9237cafb9cd5cd81d3e
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit1debac9205d2d9237cafb9cd5cd81d3e::$classMap;

        }, null, ClassLoader::class);
    }
}
