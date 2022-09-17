<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\ConnectionBuilders;

use Jam18\PhpAlgorithms\DataBase\Interfaces\IConnection;
use Jam18\PhpAlgorithms\DataBase\QueryBuilders\AbstractQueryBuilder;
use PDO;

abstract class AbstractConnectionBuilder
{
    protected PDO $connection;
    protected AbstractQueryBuilder $queryBuilder;

    protected function setDBConnection(IConnection $connection)
    {
        $this->connection = $connection->connect();
    }

    function getConnection(): PDO
    {
        return $this->connection;
    }

    function getQueryBuilder(): AbstractQueryBuilder
    {
        return $this->queryBuilder;
    }

    abstract function getQueryBuilder():AbstractQueryBuilder;
}