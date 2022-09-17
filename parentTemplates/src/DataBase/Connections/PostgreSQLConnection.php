<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\Connections;

use Jam18\PhpAlgorithms\DataBase\Interfaces\IConnection;
use PDO;

class PostgreSQLConnection implements IConnection
{
    const DSN = "pgsql:host=1521;port=5432;dbname=testdb;";

    public function __construct(
        private string $username,
        private string $password,
        private ?array $options
    )
    {
    }

    public function connect(): PDO
    {
        $DSN = "pgsql:host=$this->host;port=$this->port;dbname=$this->dbName";
        return new PDO($DSN, $this->username, $this->password, $this->options);
    }
}