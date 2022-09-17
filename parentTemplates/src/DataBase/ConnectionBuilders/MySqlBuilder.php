<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\ConnectionBuilders;

use Jam18\PhpAlgorithms\DataBase\Connections\MySQLConnection;
use Jam18\PhpAlgorithms\DataBase\QueryBuilders\AbstractQueryBuilder;
use Jam18\PhpAlgorithms\DataBase\QueryBuilders\MySqlQueryBuilder;

class MySqlBuilder extends AbstractConnectionBuilder
{

    public function __construct(string $username, string $password, ?array $options)
    {
        $connection = new MySQLConnection($username, $password, $options);
        $this->setDBConnection($connection);
        $this->queryBuilder = new MySqlQueryBuilder($this->connection);
    }


    function getQueryBuilder(): AbstractQueryBuilder
    {
        return $this->queryBuilder;
    }
}