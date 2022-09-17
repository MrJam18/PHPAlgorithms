<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\ConnectionBuilders;

use Jam18\PhpAlgorithms\DataBase\Connections\PostgreSQLConnection;
use Jam18\PhpAlgorithms\DataBase\QueryBuilders\AbstractQueryBuilder;
use Jam18\PhpAlgorithms\DataBase\QueryBuilders\PostgreSQLQueryBuilder;

class PostgreSQLBuilder extends AbstractConnectionBuilder
{

    public function __construct(string $username, string $password, ?array $options)
    {
        $connection = new PostgreSQLConnection($username, $password, $options);
        $this->setDBConnection($connection);
        $this->queryBuilder = new PostgreSQLQueryBuilder($this->connection);
    }


    function getQueryBuilder(): AbstractQueryBuilder
    {
        return $this->queryBuilder;
    }
}