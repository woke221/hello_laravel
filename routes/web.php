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

//Route::get('/admin/detail/{id}', 'Admin\IndexController@detail');

//Route::name('admin.detail')->get('/admin/detail/{id}', 'Admin\IndexController@detail');

// 定义资源路由
//Route::name('admin')->resource('/admin/user', 'Admin\UserController');

Route::namespace('Admin')->group(function(){
    Route::get('goods', 'GoodsController@index');
    Route::get('goods/create', 'GoodsController@create');
    Route::post('goods', 'GoodsController@store');
});