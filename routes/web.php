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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'role:admin'], function () {
    Route::resource('post/categories', 'PostCategoryController', [
        'except' => ['show'],
        'names' => [
            'index' => 'admin.post.categories.index',
            'create' => 'admin.post.categories.create',
            'store' => 'admin.post.categories.store',
            'edit' => 'admin.post.categories.edit',
            'update' => 'admin.post.categories.update',
            'destroy' => 'admin.post.categories.destroy',
        ],
    ]);
    Route::resource('post/tags', 'PostTagController', [
        'except' => ['show'],
        'names' => [
            'index' => 'admin.post.tags.index',
            'create' => 'admin.post.tags.create',
            'store' => 'admin.post.tags.store',
            'edit' => 'admin.post.tags.edit',
            'update' => 'admin.post.tags.update',
            'destroy' => 'admin.post.tags.destroy',
        ],
    ]);
    Route::resource('post/statuses', 'PostStatusController', [
        'except' => ['show'],
        'names' => [
            'index' => 'admin.post.statuses.index',
            'create' => 'admin.post.statuses.create',
            'store' => 'admin.post.statuses.store',
            'edit' => 'admin.post.statuses.edit',
            'update' => 'admin.post.statuses.update',
            'destroy' => 'admin.post.statuses.destroy',
        ],
    ]);
});
