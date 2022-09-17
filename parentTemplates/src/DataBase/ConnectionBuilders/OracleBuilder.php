<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\ConnectionBuilders;

use Jam18\PhpAlgorithms\DataBase\Connections\OracleConnection;
use Jam18\PhpAlgorithms\DataBase\QueryBuilders\AbstractQueryBuilder;
use Jam18\PhpAlgorithms\DataBase\QueryBuilders\OracleQueryBuilder;

class OracleBuilder extends AbstractConnectionBuilder
{
    public function __construct(string $username, string $password, ?array $options = null)
    {
        $connection = new OracleConnection($username, $password, $options);
        $this->setDBConnection($connection);
        $this->queryBuilder = new OracleQueryBuilder($this->connection);
    }

    function getQueryBuilder(): AbstractQueryBuilder
    {
        return $this->queryBuilder;
    }
}