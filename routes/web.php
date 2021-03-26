<?php

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

Route::get('test', function () {
	return 'test';
});

Route::post('admin/test', function () {
	return 'admin/test';
});

Route::match(['get', 'post'], 'another',	 function () {
	return 'get and post';
});

Route::any('anyMethod', function () {
	return 'any method';
});

Route::get('page/{id}', function ($id) {
	return 'page is the ' . $id;
});

Route::get('list/{id}/name/{name}', function ($id, $name) {
	return 'the list is ' . $id . ' the name is ' . $name;
});

Route::get('demo/program', 'DemoController@buildWeb');

Route::get('admin/list', 'Admin\AdminListController@lists');
Route::get('test/getIpInfoByApi', 'Test\TestController@getIpInfoByApi');
Route::any('demo', 'DemoController@demo');
