<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfefc031ca18a792f7c12512e7d485053
{
    public static $classMap = array (
        'SimpleXLSX' => __DIR__ . '/../..' . '/src/SimpleXLSX.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitfefc031ca18a792f7c12512e7d485053::$classMap;

        }, null, ClassLoader::class);
    }
}
