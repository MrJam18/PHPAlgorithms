<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\Common;

class DBRecord
{
    public function __construct(
        private array $values,
        private string $tableName
    )
    {
    }


    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * @return array
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array $values
     */
    public function setValues(array $values): void
    {
        $this->values = $values;
    }
}