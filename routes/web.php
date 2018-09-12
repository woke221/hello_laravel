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


Route::namespace('Admin')->group(function(){
    // 显示列表
    Route::get('goods', 'GoodsController@index');
    // 显示添加的表单
    Route::get('goods/create', 'GoodsController@create');
    // 处理表单数据写入数据库的post请求
    Route::post('goods', 'GoodsController@store');
    // 显示编辑商品数据的表单
    Route::get('goods/{id}/edit', 'GoodsController@edit')->where('id', '[0-9]+');
    // 更新数据写入数据库的post请求
    Route::put('goods/{id}', 'GoodsController@update')->where('id', '[0-9]+');
    // 删除记录
    Route::get('goods/{id}/delete', 'GoodsController@delete')->where('id', '[0-9]+');
});

// 路由优化 使用资源路由
//Route::resource('goods', 'Admin\GoodsController');