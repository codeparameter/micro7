<?php

namespace App\Models\Contracts;

use Medoo\Medoo;

class  MysqlBaseModel extends BaseModel
{
    public function __construct($id)
    {
        $this->connection = new Medoo([
            // [required]
            'type' => 'mysql',
            'host' => $_ENV['DB_HOST'],
            'database' => $_ENV['DB_NAME'],
            'username' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASS'],

            // [optional]
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'port' => $_ENV['DB_PORT'],

            // [optional] The table prefix. All table names will be prefixed as PREFIX_table.
            'prefix' => '',

            // [optional] To enable logging. It is disabled by default for better performance.
            'logging' => true,

            // [optional]
            // Error mode
            // Error handling strategies when the error has occurred.
            // PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
            // Read more from https://www.php.net/manual/en/pdo.error-handling.php.
            'error' => \PDO::ERRMODE_EXCEPTION,

            // [optional]
            // The driver_option for connection.
            // Read more from http://www.php.net/manual/en/pdo.setattribute.php.
            'option' => [
                \PDO::ATTR_CASE => \PDO::CASE_NATURAL
            ],

            // [optional] Medoo will execute those commands after the database is connected.
            'command' => [
                'SET SQL_MODE=ANSI_QUOTES'
            ]
        ]);

        if(!is_null($id))
            $this->find($id);
    }

    // create (insert)

    public function create(array $data): int
    {
        $this->connection->insert($this->table, $data);
        return $this->connection->id();
    }

    // read (select) single | multiple   

    public function find($id): object | null
    {
        $record = $this->connection->get($this->table, '*', [$this->primaryKey => $id]);

        if(is_null($record))
            return null;

        foreach($record as $col => $val)
            $this->attrs[$col] = $val;

        return $this;
    }

    public function findAll(array $where): array
    {
        return $this->connection->select($this->table, '*', $where);
    }

    public function getAll(): array
    {
        return $this->connection->select($this->table, '*');
    }

    public function get(array $columns, $where = []): array
    {
        return $this->connection->select($this->table, $columns, $where);
    }

    // update records

    public function update(array $data, array $where): int
    {
        return $this->connection->update($this->table, $data, $where)->rowCount();
    }

    // save

    public function save(): object
    {
        $record_id = $this->getAttr($this->primaryKey);
        $this->update($this->attrs, [$this->primaryKey => $record_id]);
        return $this;
    }

    // delete

    public function delete(array $where): int
    {
        return $this->connection->delete($this->table, $where)->rowCount();
    }

    public function remove(): int{
        $record_id = $this->getAttr($this->primaryKey);
        return $this->delete([$this->primaryKey => $record_id]);
    }

    // count

    public function count(array $where): int
    {
        return $this->connection->count($this->table, $where);
    }

    // sum

    public function sum($column, array $where = []): int
    {
        return $this->connection->sum($this->table, $column, $where);
    }
}
