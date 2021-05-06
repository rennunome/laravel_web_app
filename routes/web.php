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
    return view('welcome');
});

Route::get('/top', function () {
    return view('top/top');
})->middleware(['auth'])->name('top');

require __DIR__.'/auth.php';

//list画面にリストを表示
Route::post('/list', 'App\Http\Controllers\qaList\listController@showList');

//reg画面表示
Route::get('/reg', 'App\Http\Controllers\Register\regController@showForm');

//reg入力値バリデーション
Route::post('/reg', 'App\Http\Controllers\Register\regController@validateForm');

//DB登録
Route::post('/reg', 'App\Http\Controllers\Register\regController@qaDb');
