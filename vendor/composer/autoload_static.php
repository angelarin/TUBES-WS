<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5ad24e68a62830c2ba8cbaecbfe0e244
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'EasyRdf\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'EasyRdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/easyrdf/easyrdf/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5ad24e68a62830c2ba8cbaecbfe0e244::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5ad24e68a62830c2ba8cbaecbfe0e244::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5ad24e68a62830c2ba8cbaecbfe0e244::$classMap;

        }, null, ClassLoader::class);
    }
}
