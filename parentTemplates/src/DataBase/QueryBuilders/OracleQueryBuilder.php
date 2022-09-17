<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\QueryBuilders;

use Jam18\PhpAlgorithms\DataBase\Common\TableColumn;

class OracleQueryBuilder extends AbstractQueryBuilder
{

    function createTable(string $tableName, array $columns): void
    {
        // TODO: Implement createTable() method.
    }

    function modifyColumn(string $tableName, TableColumn $column): void
    {
        // TODO: Implement modifyColumn() method.
    }

    function addColumn(string $tableName, TableColumn $column): void
    {
        // TODO: Implement addColumn() method.
    }
}