<?php
namespace App\Models\Contracts;

class JsonBaseModel extends BaseModel{
    private string $baseFile ;
    public function __construct()
    {
        $this->baseFile = BASEPATH . "/Storage/JSON/$this->tableName.json" ;
    }
    private function readJson(): array # Read Json => array/Object
    {
        return json_decode(file_get_contents($this->baseFile), 1);
    }
    private function writeJson($data): int # Write Json
    {
        $json = json_encode($data);
        if(!file_put_contents($this->baseFile, $json, 1)){
            return 0;
        }
        return 1;
    }
    public function create(array $data): int
    {
        $json_array = $this->readJson();
        $json_array[] = $data;
        if($this->writeJson($json_array)){
            return 1;
        }
        return 0;
    }
    public function find(int $id): object
    {
        $json_array = $this->readJson();
        foreach ($json_array as $row){
            if($row[$this->primaryKey] == $id) return $row;
        }
        return (object)[];
    }
    public function get(array $columns, array $where): object
    {
        return (object)[];
    }
    public function readAll(): array
    {
        return $this->readJson();
    }
    public function update(array $data, $where): int
    {
        $update = 0 ;
        $json_array = $this->readJson();
        $set = [];
        foreach ($json_array as $key => $val){
            if ($val[$this->primaryKey] == $where) {
                foreach ($data as $k => $v) {
                    $set[$k] = $v;
                }
                if($set == $val){
                    break;
                }
                $json_array[$key] = $set;
                $this->writeJson($json_array);
                $update++;
            }
        }
        return $update;
    }
    public function delete($where): int
    {
        $delete = 0 ;
        $json_array = $this->readJson();
        foreach ($json_array as $key => $val){
            if ($val[$this->primaryKey] == $where) {
                unset($json_array[$key]);
                $this->writeJson($json_array);
                $delete++;
            }
        }
        return $delete;
    }
}