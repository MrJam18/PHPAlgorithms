<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\Interfaces;


use PDO;

interface IConnection
{
    public function connect():PDO;
}