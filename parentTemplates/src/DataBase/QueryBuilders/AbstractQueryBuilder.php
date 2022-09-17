<?php
declare(strict_types=1);

namespace Jam18\PhpAlgorithms\DataBase\QueryBuilders;



use Jam18\PhpAlgorithms\DataBase\Common\DBRecord;
use Jam18\PhpAlgorithms\DataBase\Common\TableColumn;
use Jam18\PhpAlgorithms\Exceptions\NotFoundException;
use PDO;

abstract class AbstractQueryBuilder
{
    public function __construct(private readonly PDO $connection)
    {
    }

    function insert(DBRecord $record): void
    {
        $columns = '';
        $prepares = '';
        foreach ($record->getValues() as $key => $value) {
            $columns .= "$key, ";
            $prepares .= ":$key, ";
        }
        $columns = rtrim($columns, ', ');
        $prepares = rtrim($prepares, ', ');
        $query = "INSERT INTO " . $record->getTableName() . " ($columns) VALUES ($prepares)";
        $statement = $this->connection->prepare($query);
        $statement->execute($record->getValues());
    }

    /**
     * @throws NotFoundException
     */
    function selectOne(array $where, string $tableName, string $select = '*'): DBRecord
    {
        $whereString = $this->prepareWhere($where);
        $statement = $this->connection->prepare("SELECT $select FROM $tableName WHERE $whereString LIMIT 1");
        $statement->execute($where);
        $result = $statement->fetch();
        if ($result === false) {
            $columns = implode(', ', array_keys($where));
            $values = implode(', ', $where);
            throw new NotFoundException(
                "Cannot found row in table $tableName where $columns = $values");
        }
        return new DBRecord($result, $tableName);
    }

    /**
     * @throws NotFoundException
     */
    function select(array $where, $tableName, string $select = '*'):array
    {
        $whereString = $this->prepareWhere($where);
        $statement =  $this->connection->prepare("SELECT $select FROM $this->tableName WHERE $whereString");
        $statement->execute($where);
        $result = [];
        while($row = $statement->fetch()) {
            $result[] = new DBRecord($row, $tableName);
        }
        if (count($result) === 0) {
            $columns = implode(', ', array_keys($where));
            $values = implode(', ', $where);
            throw new NotFoundException(
                "Cannot found rows in table $tableName where $columns = $values");
        }
        return $result;
    }

    /**
     * @throws NotFoundException
     */
    function update(array $updated, array $where, string $tableName): void
    {
        $set = '';
        foreach ($updated as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ', ');
        $whereString = '';
        $whereExecute = [];
        foreach ($where as $key => $value) {
            $whereKey = ":where$key";
            $whereString .= "$key = $whereKey AND ";
            $whereExecute[$whereKey] = $value;
        }
        $whereString = rtrim($whereString, ' AND ');
        $execute = $whereExecute + $updated;
        $statement = $this->connection->prepare("UPDATE $tableName
        SET $set WHERE $whereString");
        $statement->execute($execute);
        if($statement->rowCount() === 0) {
            $columns = implode(', ', array_keys($where));
            $values = implode(', ', $where);
            throw new NotFoundException("rows in table $tableName where $columns = $values dont was updated because don't found");
        }
    }

    /**
     * @throws NotFoundException
     */
    function destroy(array $where, $tableName): void
    {
        $whereString = $this->prepareWhere($where);
        $statement = $this->connection->prepare("DELETE FROM $tableName WHERE $whereString");
        $statement->execute($where);
        if($statement->rowCount() === 0) {
            $columns = implode(', ', array_keys($where));
            $values = implode(', ', $where);
            throw new NotFoundException("rows in table $tableName where $columns = $values dont was deleted because don't found");
        }

    }

    private function prepareWhere(array $where): string
    {
        $whereString = '';
        foreach ($where as $key => $value) {
            $whereString .= "$key = :$key AND ";
        }
        return rtrim($whereString, ' AND ');
    }

    abstract function createTable(string $tableName, array $columns): void;

    function destroyTable(string $tableName): void
    {
        $statement = $this->connection->prepare("DROP TABLE ?");
        $statement->execute([$tableName]);
    }

    function query(string $query)
    {
        $this->connection->query($query);
    }

    abstract function modifyColumn(string $tableName, TableColumn $column): void;
    abstract function addColumn(string $tableName, TableColumn $column): void;


}