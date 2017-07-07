<?php
/**
 * Created by PhpStorm.
 * User: MPC
 * Date: 2017/6/5
 * Time: 14:59
 */

namespace App\Util;


class ClassFinderUtil
{
    //This value should be the directory that contains composer.json
    const appRoot = __DIR__ . "/../../";

    public static function getClassesInNamespace($namespace)
    {
        $files = scandir(self::getNamespaceDirectory($namespace));

        $classes = array_map(function ($file) use ($namespace) {
            return $namespace . '\\' . str_replace('.php', '', $file);
        }, $files);

        return array_filter($classes, function ($possibleClass) {
            return class_exists($possibleClass);
        });
    }

    private static function getDefinedNamespaces()
    {
        $composerJsonPath = self::appRoot . 'composer.json';
        $composerConfig = json_decode(file_get_contents($composerJsonPath));

        //Apparently PHP doesn't like hyphens, so we use variable variables instead.
        $psr4 = "psr-4";
        return (array)$composerConfig->autoload->$psr4;
    }

    private static function getNamespaceDirectory($namespace)
    {
        $dir = '';
        $composerNamespaces = self::getDefinedNamespaces();
        $namespaceFragments = explode('\\', $namespace);
        foreach ($namespaceFragments as $namespaceFragment) {
            if (array_key_exists($namespaceFragment . '\\', $composerNamespaces)) {
                $dir = $composerNamespaces[$namespaceFragment . '\\'];
            } else {
                $dir .= DIRECTORY_SEPARATOR . $namespaceFragment;
            }
        }
        $dir = self::appRoot . $dir;
        return $dir;
    }
}