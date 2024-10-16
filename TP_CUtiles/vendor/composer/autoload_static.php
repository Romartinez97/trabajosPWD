<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8ece59defb111bfa981d2bdb27df73d3
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Process\\' => 26,
            'Spatie\\ImageOptimizer\\' => 22,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'L' => 
        array (
            'LanguageDetection\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Spatie\\ImageOptimizer\\' => 
        array (
            0 => __DIR__ . '/..' . '/spatie/image-optimizer/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'LanguageDetection\\' => 
        array (
            0 => __DIR__ . '/..' . '/patrickschur/language-detection/src/LanguageDetection',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8ece59defb111bfa981d2bdb27df73d3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8ece59defb111bfa981d2bdb27df73d3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8ece59defb111bfa981d2bdb27df73d3::$classMap;

        }, null, ClassLoader::class);
    }
}
