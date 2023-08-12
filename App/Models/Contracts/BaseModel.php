<?php
namespace App\Models\Contracts;

abstract class BaseModel implements CrudInterface {

    protected  $connection;
    protected string $tableName = '';
    protected array $attributes;
    protected string $primaryKey = 'id';
    protected int $pageSize = 10;

}