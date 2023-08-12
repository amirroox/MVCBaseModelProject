<?php
namespace App\Models\Contracts;

use Medoo\Medoo;
use PDO;

class MySqlBaseModel extends BaseModel{
    public function __construct()
    {
        try {
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
                'port' => 3306,

                // [optional] To enable logging. It is disabled by default for better performance.
                'logging' => true,

                // [optional] Error mode
                'error' => PDO::ERRMODE_EXCEPTION,

            ]);
        }
        catch (\PDOException $e){
            echo "Connection Failed: " . $e ;
        }
    }
    public function create(array $data): int # [age = 13, name = amir]
    {
        $this->connection->insert($this->tableName , $data);
        return $this->connection->id(); // id Last Insert
    }
    public function find(int $id): object
    {
        $data = $this->connection->get($this->tableName, "*", ["$this->primaryKey[=]" => $id]);
        return (object)$data;
    }
    public function get(array $columns, array $where): object
    {
        if($columns === ["*"]) $columns = "*";
        $data = $this->connection->select($this->tableName, $columns, $where);
        return (object)$data;
    }
    public function readAll() :array
    {
        return $this->connection->select($this->tableName, "*");
    }
    public function update(array $data, $where): int
    {
        $data = $this->connection->update($this->tableName, $data, $where);
        return $data->rowCount();
    }
    public function delete($where): int
    {
        $data = $this->connection->delete($this->tableName, $where);
        return $data->rowCount();
    }
}