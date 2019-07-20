<?php

namespace App\ApiConfigObject;

use Closure;
use InvalidArgumentException;
use Traversable;

class Collection
{
    private $configObjects;

    public function __construct(Traversable $configObjects)
    {
        $this->configObjects = $configObjects;
    }

    public function get(string $className)
    {
        $filteredResources = $this->getFilteredItems($className);

        if (count($filteredResources) !== 1) {
            $this->error($className);
        }

        return $filteredResources[0];
    }

    public function getAll(): Traversable
    {
        return $this->configObjects;
    }

    public function has(?string $className = null): bool
    {
        $output = false;

        if ($className !== null) {
            $output = count(array_filter(iterator_to_array($this->configObjects), $this->filter($className))) === 1;
        }

        return $output;
    }

    private function getFilteredItems(string $className): array
    {
        return array_values(
            array_filter(
                iterator_to_array($this->configObjects),
                $this->filter($className)
            )
        );
    }

    private function filter(?string $className): Closure
    {
        return static function (ConfigObjectInterface $restResource) use ($className): bool {
            return $className !== null && $restResource instanceof $className;
        };
    }

    private function error(string $className): void
    {
        $message = sprintf(
            'Config object \'%s\' does not exists',
            $className
        );

        throw new InvalidArgumentException($message);
    }
}
