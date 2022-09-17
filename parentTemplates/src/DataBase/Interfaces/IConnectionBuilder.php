<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\Interfaces;

use Jam18\PhpAlgorithms\DataBase\QueryBuilders\AbstractQueryBuilder;
use PDO;

interface IConnectionBuilder
{
    function getConnection(): PDO;
    function getQueryBuilder(): AbstractQueryBuilder;
}