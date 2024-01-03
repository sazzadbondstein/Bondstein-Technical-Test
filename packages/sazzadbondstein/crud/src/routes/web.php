<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Crud\Http\Controllers';

Route::group([
    'namespace' => $namespace,
    'prefix' => 'crud',
    'middlware' => 'web'
], function () {
    Route::get('/', 'TaskController@index');
    Route::get('/add', 'TaskController@add')->name('add-task');
    Route::post('/store', 'TaskController@store')->name('save-task');
    Route::get('/task', 'TaskController@show')->name('show-task');
    Route::get('/edit{task}', 'TaskController@edit')->name('edit-task');
    Route::post('/task/{task}', 'TaskController@update')->name('update-task');
    Route::delete('/task/{task}', 'TaskController@delete')->name('delete-task');
});
