<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\Connections;

use Jam18\PhpAlgorithms\DataBase\Interfaces\IConnection;
use PDO;

class OracleConnection implements IConnection
{
    const DSN = 'oci:dbname=//localhost:1521/mydb';

    public function __construct(
        private string $username,
        private string $password,
        private ?array $options = null
    )
    {

    }

    public function connect(): PDO
    {
       $dsn = "oci:dbname=$this->dbName";
        return new PDO($dsn, $this->username, $this->password, $this->options);
    }
}