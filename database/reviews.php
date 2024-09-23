<?php
require "../vendor/autoload.php";
require "../Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('reviews', function ($table) {
    $table->id();
    $table->text('content');
    $table->integer('rating');
    $table->string('username', 50)->unique();
    $table->integer('company_id');
    $table->timestamps();
});