<?php

namespace App\Controllers;

class PostController{
    public function index(){
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
    }

    public function post($id){
        nice_dump("$id");
    }

    public function create(){

    }
}