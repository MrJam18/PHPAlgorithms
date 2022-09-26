<?php

declare(strict_types = 1);

namespace Model\Repository;

use Exceptions\EmptyCacheException;
use Model\Entity;
use Model\IdentityMap\IdentityMap;

class Product
{
    private readonly IdentityMap $identityMap;
    const CLASSNAME = 'Product';

    public function __construct()
    {
        $this->identityMap = new IdentityMap();
    }

    /**
     * Поиск продуктов по массиву id
     *
     * @param int[] $ids
     * @return Entity\Product[]
     */
    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }

        $productList = [];
        $newProductIdsList = [];
        foreach ($ids as $id) {
            try {
                $product = $this->identityMap->get(static::CLASSNAME, $id);
                $productList[] = $product;
            }
            catch (EmptyCacheException)
            {
                $newProductIdsList[] = $id;
            }
        }
        if(count($newProductIdsList)) {
            $newProductList = $this->getDataFromSource(['id' => $newProductIdsList]);
            foreach ($newProductList as $item) {
                $product = $this->createProduct($item['id'], $item['name'], $item['price']);
                $productList[] = $product;
            }
        }
        return $productList;
    }

    /**
     * Получаем все продукты
     *
     * @return Entity\Product[]
     */
    public function fetchAll(): array
    {
        $productList = [];
        foreach ($this->getDataFromSource() as $item) {
            try {
                $product = $this->identityMap->get(static::CLASSNAME, $item['id']);
                $productList[] = $product;
            }
            catch (EmptyCacheException)
            {
                $product = $this->createProduct($item['id'], $item['name'], $item['price']);
                $productList[] = $product;
            }
        }

        return $productList;
    }

    private function createProduct(int $id, string $name, int|float $price)
    {
        $product = new Entity\Product($id, $name, $price);
        $this->identityMap->add($product);
        return $product;
    }

    /**
     * Получаем продукты из источника данных
     *
     * @param array $search
     *
     * @return array
     */
    private function getDataFromSource(array $search = []): array
    {
        $dataSource = [
            [
                'id' => 1,
                'name' => 'PHP',
                'price' => 15300,
            ],
            [
                'id' => 2,
                'name' => 'Python',
                'price' => 20400,
            ],
            [
                'id' => 3,
                'name' => 'C#',
                'price' => 30100,
            ],
            [
                'id' => 4,
                'name' => 'Java',
                'price' => 30600,
            ],
            [
                'id' => 5,
                'name' => 'Ruby',
                'price' => 18600,
            ],
            [
                'id' => 8,
                'name' => 'Delphi',
                'price' => 8400,
            ],
            [
                'id' => 9,
                'name' => 'C++',
                'price' => 19300,
            ],
            [
                'id' => 10,
                'name' => 'C',
                'price' => 12800,
            ],
            [
                'id' => 11,
                'name' => 'Lua',
                'price' => 5000,
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return in_array($dataSource[key($search)], current($search), true);
        };

        return array_filter($dataSource, $productFilter);
    }
}
