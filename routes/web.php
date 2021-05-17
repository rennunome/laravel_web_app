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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//トップ表示
Route::get('/top', 'App\Http\Controllers\Top\topController@showTop');

//リスト表示
Route::post('/list', 'App\Http\Controllers\qaList\listController@showList');

//reg画面表示
Route::get('/reg', 'App\Http\Controllers\Register\regController@showForm');

//入力値バリデーション
Route::post('/regValidate', 'App\Http\Controllers\Register\regValidateController@validateForm');

//DB登録
Route::post('/reg', 'App\Http\Controllers\Register\regController@qaDb');

//delete confirm画面表示
Route::post('/deleteConfirm', 'App\Http\Controllers\Delete\deleteController@findByQuestionsId');

//delete confirm画面表示
Route::get('/delete', 'App\Http\Controllers\Delete\deleteController@deleteQAndA');

//edit画面表示
Route::get('/edit', 'App\Http\Controllers\Edit\editController@findByQuestionsId');

//入力値バリデーション
Route::post('/editValidate', 'App\Http\Controllers\Edit\editValidateController@validateForm');

//DB登録
Route::post('/editDb', 'App\Http\Controllers\Edit\editController@qaEditDb');

//test画面表示
Route::get('/test', 'App\Http\Controllers\Test\testController@showTest');

//テスト採点
Route::post('/mark', 'App\Http\Controllers\Test\testController@markTest');

//History画面表示
Route::get('/history', 'App\Http\Controllers\History\historyController@showHistory');

//Userリスト表示
Route::get('/userList', 'App\Http\Controllers\User\userListController@showUserList');

//User登録画面表示（Laravel Breezeデフォルト）
Route::post('/authRegister', 'App\Http\Controllers\Auth\RegisteredUserController@create');

//UserDeleteConfirm画面表示
Route::get('/userDeleteConfirm', 'App\Http\Controllers\User\userDeleteController@showDelete');

//UserDeleteConfirm画面表示
Route::post('/userDelete', 'App\Http\Controllers\User\userDeleteController@userDelete');

//UserEdit画面表示
Route::get('/userEdit', 'App\Http\Controllers\User\userEditController@userEdit');

//UserEditValidation
Route::post('/userEditValidation', 'App\Http\Controllers\User\userValidationController@userValidation');

//UserEdit画面表示
Route::post('/userEdit', 'App\Http\Controllers\User\userEditController@userEditDb');

//logoutに遷移
// Route::post('/logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy');

//UserRegister画面表示
Route::get('/showUser', 'App\Http\Controllers\User\userRegisterController@showUser');

//UserRegisterValidation
Route::get('/userValidate', 'App\Http\Controllers\User\userRegisterValidationController@userRegisterValidation');

//UserDb登録
Route::post('/userDb', 'App\Http\Controllers\User\userRegisterController@userDb');