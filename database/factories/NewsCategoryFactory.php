<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\NewsCategory;
use Faker\Factory;
//use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(NewsCategory::class, function () {
    $faker = Factory::create('ru_RU');
    $title = $faker->name;
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'state' => rand(0,1)
    ];
});
