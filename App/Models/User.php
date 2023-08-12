<?php
namespace App\Models;

use App\Models\Contracts\MySqlBaseModel;

class User extends MySqlBaseModel {
    protected string $tableName = 'Users';
}
