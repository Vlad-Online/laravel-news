<?php

use App\News;
use App\NewsCategory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(NewsCategory::class, 10)->create()->each(function (NewsCategory $newsCategory) {
            $newsCategory->news()->saveMany(factory(News::class, rand(8, 13))->make());
        });
    }
}
