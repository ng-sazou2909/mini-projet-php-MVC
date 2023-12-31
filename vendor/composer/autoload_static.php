<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6fbfaa3c47b15bc36dea65d539094083
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MiniProjetPhp\\Twig\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MiniProjetPhp\\Twig\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit6fbfaa3c47b15bc36dea65d539094083::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6fbfaa3c47b15bc36dea65d539094083::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6fbfaa3c47b15bc36dea65d539094083::$classMap;

        }, null, ClassLoader::class);
    }
}
