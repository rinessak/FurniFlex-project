<?php
require "../vendor/autoload.php";
require "../Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('companies', function ($table) {
    $table->id();
    $table->integer('user_id');
    $table->string('company_name', 150);
    $table->string('contact_email')->unique();
    $table->string('phone_numbers');
    $table->text('description');
    $table->string('website');
    $table->timestamps();
});