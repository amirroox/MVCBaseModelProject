<?php
const BATH_PATH = __DIR__ . "/../";
include BATH_PATH . "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(BATH_PATH);
$dotenv->load();

include BATH_PATH . "helpers/helper.php";
