<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\News;
use Faker\Factory;
//use Faker\Generator as Faker;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

$factory->define(News::class, function () {
    $faker    = Factory::create('ru_RU');
    $tempFile = $faker->image('/tmp', 640, 480);
    $res      = fopen($tempFile, 'rw');
    $image    = new File(basename($tempFile), $res);

    $filename = Str::random(20);

    while (Storage::exists('public'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$filename.'.'.$image->getClientOriginalExtension())) {
        $filename = Str::random(20);
    }

    $image->storeAs(
        'public'.DIRECTORY_SEPARATOR.'images',
        $filename.'.'.$image->getClientOriginalExtension()
    );

    $title   = $faker->name;
    $preview = $faker->realText(100);

    return [
        'title'       => $title,
        'slug'        => Str::slug($title),
        'content'     => "<div>".$preview."<strong>This is strong text</strong> with <button>button</button></div>".$faker->sentence,
        'image'       => "images".DIRECTORY_SEPARATOR.$filename.'.'.$image->getClientOriginalExtension(),
        'state'       => 1,
        'views_count' => rand(1, 10),
        'preview'     => $preview,
    ];
});
