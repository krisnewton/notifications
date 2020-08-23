<?php

Route::group(['prefix' => 'notifications', 'as' => 'notifications.', 'middleware' => 'web'], function () {
	Route::get('/', 'App\Http\Controllers\User\NotificationController@index')->name('index');
	Route::get('/{notification}', 'App\Http\Controllers\User\NotificationController@opener')->name('open');
});
