<?php
require "../vendor/autoload.php";
require "../Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('company_locations', function ($table) {
    $table->id();
    $table->integer('company_id');
    $table->string('address');
    $table->timestamps();
});