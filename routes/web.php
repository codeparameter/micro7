<?php

use App\Core\Routing\Route;

Route::get('/', function () {
    nice_dump("123");
});

Route::get('/posts', function () {
    view('posts', [
        'posts' => [
            [
                'title' => 'post1 title',
                'sumary' => 'post1 sumary',
                'context' => 'post1 context',
                'lastUpdate' => 10,
            ],
            [
                'title' => 'post2 title',
                'sumary' => 'post2 sumary',
                'context' => 'post2 context',
                'lastUpdate' => 20,
            ],
            [
                'title' => 'post3 title',
                'sumary' => 'post3 sumary',
                'context' => 'post3 context',
                'lastUpdate' => 30,
            ],
        ]
    ]);
});

Route::post('/posts/create', function () {
});

Route::get('/posts/{id}', function ($id) {
    nice_dump("$id");
});
