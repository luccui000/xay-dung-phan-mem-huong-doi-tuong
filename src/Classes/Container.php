<?php

namespace Luccui\Classes;
use Luccui\Exceptions\ContainerException;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionUnionType;

class Container implements ContainerInterface
{
    private static array $entries = [];

    public function get(string $id)
    {
        if($this->has($id)) {
            $entry = static::$entries[$id];
            if(is_callable($entry))
                return $entry($this);
            $id = $entry;
        }
        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset(static::$entries[$id]);
    }
    public function set($id, callable|string $concrete)
    {
        static::$entries[$id] = $concrete;
    }
    public function resolve(string $id)
    {
        $reflectionClass = new ReflectionClass($id);
        if(!$reflectionClass->isInstantiable()) {
            throw new ContainerException("Class {$id} is not instantiable");
        }
        $constructor = $reflectionClass->getConstructor();

        if(!$constructor) {
            return new $id;
        }
        $parameters = $constructor->getParameters();
        $dependencies = array_map(function(ReflectionParameter $param) {
            $type = $param->getType();

            if(!$type)
                throw new ContainerException("");
            if($type instanceof ReflectionUnionType)
                throw new ContainerException("");
            if($type instanceof ReflectionNamedType && !$type->isBuiltin()) {
                return $this->get($type->getName());
            }
            return null;
        }, $parameters);
        return $reflectionClass->newInstanceArgs($dependencies);
    }
}
