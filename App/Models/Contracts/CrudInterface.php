<?php
namespace App\Models\Contracts;

interface CrudInterface{

    # Create    => "INSERT INTO table_name (col1, col2, ...) VALUES (val1, val2, ...)"
    function create(array $data): int;

    # Read      => "SELECT (Column) FROM table_name WHERE (Conditions)"
    function find(int $id): object;                     // find one id
    function get(array $columns, array $where): object; // Find Conditions
    function readAll() :array;                                 // Find All

    # Update    => "UPDATE table_name SET col1=val1, ... WHERE (Conditions)"
    function update(array $data, $where): int;

    # Delete    => "DELETE FORM table_name WHERE (Conditions)"
    function delete($where): int;
}