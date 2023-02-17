<?php

use App\Core\Routing\Route;

Route::get('/', function(){
    nice_dump("123");
});

Route::get('/posts/{id}', function($id){
    nice_dump("$id");
});