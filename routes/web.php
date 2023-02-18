<?php

use App\Core\Routing\Route;

Route::get('/', function () {
    nice_dump("123");
}, [
    'Welcome'
]);

Route::get('/posts', 'Post@index');

Route::post('/posts/create', 'Post@create');

Route::get('/posts/{id}', ['Post', 'post']);
