<?php

namespace MK\MyPlugin\Main;

use MK\MyPlugin\Attributes\HookInterface;
use ReflectionAttribute;
use ReflectionClass;

class App
{
    public function __construct(
        private array $classNames = []
    )
    {
        $this->classNames = require MYPLUGIN_DIR . 'config/hooked-classes.php';
    }

    public function init(): void
    {
        $this->registerHooks();
    }

    private function registerHooks(): void
    {
        $instances = []; 

        foreach ($this->classNames as $className) {
            $reflectionClass = new ReflectionClass($className);
    
            foreach ($reflectionClass->getMethods() as $method) {
                $attributes = $method->getAttributes(HookInterface::class, ReflectionAttribute::IS_INSTANCEOF);

                foreach ($attributes as $attribute) {
                    // Klasse mit Hooks instanziieren, falls noch nicht geschehen
                    if (! array_key_exists($className, $instances)) {
                        $instances[$className] = new $className();
                    }
    
                    // Filter-Klasse instanziieren
                    $filterClass = $attribute->newInstance();
                    $filterClass->register(
                        [
                            $instances[$className],
                            $method->getName()
                        ]
                    );
                }
            }
        }
    }
}
