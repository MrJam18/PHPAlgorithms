<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\Connections;

use Jam18\PhpAlgorithms\DataBase\Interfaces\IConnection;
use PDO;

class MySQLConnection implements IConnection
{
    const DSN = 'mysql:host=localhost;dbname=testdb';

    public function __construct(
        private string $username,
        private string $password,
        private ?array $options
    )
    {
    }

    function connect(): PDO
    {

        return new PDO(static::DSN, $this->username, $this->password, $this->options);
    }
}