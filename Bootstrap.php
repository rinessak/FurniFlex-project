<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Config;

$capsule = new Capsule;
$capsule->addConnection([
    "driver" => Config::DB_DRIVER,
    "host" => Config::DB_HOST,
    "database" => Config::DB_NAME,
    "username" => Config::DB_USER,
    "password" => Config::DB_PASSWORD
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
