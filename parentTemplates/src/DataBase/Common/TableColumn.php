<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\Common;

class TableColumn 
{
    public function __construct(
        private string $name,
        private string $dataType,
        private string $length
    )
    {
    }

    /**
     * @return string
     */
    public function getDataType(): string
    {
        return $this->dataType;
    }

    /**
     * @return string
     */
    public function getLength(): string
    {
        return $this->length;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}