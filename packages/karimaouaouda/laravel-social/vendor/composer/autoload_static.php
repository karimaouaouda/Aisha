<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit78420188400381790667c96af5d1d4e0
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Karimaouaouda\\LaravelSocial\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Karimaouaouda\\LaravelSocial\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit78420188400381790667c96af5d1d4e0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit78420188400381790667c96af5d1d4e0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit78420188400381790667c96af5d1d4e0::$classMap;

        }, null, ClassLoader::class);
    }
}