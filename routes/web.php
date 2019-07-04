<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('NewsIndex');
});

Route::get('/news', 'NewsCategoryController@index')->name('NewsIndex');
Route::get('/news/{newsCategorySlug}', 'NewsCategoryController@show')->name('NewsCategory');
Route::get('/news/{newsCategorySlug}/{news}-{newsSlug}.html', 'NewsController@show')->name('News');