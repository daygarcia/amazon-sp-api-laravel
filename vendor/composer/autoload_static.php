<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6d17bd87bf14c8b1a5391e599ec51cc9
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Daygarcia\\AmazonSpApiLaravel\\' => 29,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Daygarcia\\AmazonSpApiLaravel\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6d17bd87bf14c8b1a5391e599ec51cc9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6d17bd87bf14c8b1a5391e599ec51cc9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6d17bd87bf14c8b1a5391e599ec51cc9::$classMap;

        }, null, ClassLoader::class);
    }
}