<?php
declare(strict_types=1);

namespace Model\IdentityMap;

use Exceptions\EmptyCacheException;
use Interfaces\IEntity;
use Model\Repository\Product;

class IdentityMap
{
    private array $identityMap = [];
    const PREFIX = 'Model\\Entity\\';

    public function add(IEntity $obj)
    {
        $key = $this->getGlobalKey(get_class($obj), $obj->getId());
        $key = str_replace(self::PREFIX, '', $key);
        $this->identityMap[$key] = $obj;
    }

    public function get(string $classname, int $id): IEntity
    {
        $key = $this->getGlobalKey($classname, $id);
        if (isset($this->identityMap[$key])) {
            return $this->identityMap[$key];
        }
        throw new EmptyCacheException();
    }


    private function getGlobalKey(string $classname, int $id): string
    {
        return sprintf('%s.%d', $classname, $id);
    }

    public function getAllByClassName(string $className): array
    {
        $list = [];
        $regExp = "/$className/";
        foreach ($this->identityMap as $key => $instance) {
            if(preg_match($regExp, $key)) $list[] = $instance;
        }
        return $list;

    }
}

