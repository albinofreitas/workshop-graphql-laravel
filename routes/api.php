<?php

Route::get('users/{id}/posts', 'AuthorController@index');

Route::get('posts', 'PostController@index');
Route::post('posts', 'PostController@store');
Route::get('posts/{id}', 'PostController@show');
Route::delete('posts/{id}', 'PostController@delete');

Route::get('posts/{id}/comments', 'CommentController@index');
Route::post('posts/{id}/comments', 'CommentController@store');
