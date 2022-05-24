<?php

namespace Luccui\Classes;
use Luccui\Exceptions\ContainerException;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use ReflectionParameter;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        if($this->has($id)) {
            $entry = $this->entries[$id];
            if(is_callable($entry))
                return $entry($this);
            $id = $entry;
        }
        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }
    public function set($id, callable|string $concrete)
    {
        $this->entries[$id] = $concrete;
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
            // $name = $param->getName();
            $type = $param->getType();

            if(!$type)
                throw new ContainerException("");
            if($type instanceof \ReflectionUnionType)
                throw new ContainerException("");
            if($type instanceof \ReflectionNamedType && !$type->isBuiltin()) {
                return $this->get($type->getName());
            }
        }, $parameters);
        return $reflectionClass->newInstanceArgs($dependencies);
    }
}
