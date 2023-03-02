<?php

use App\Core\Routing\Route;

Route::get('/', function () {
    // $userModel = new App\Models\User();
    // $user_data = [
    //     'FirstName' => 'Nima',
    //     'LastName' => 'Azar',
    //     'Email' => 'codeparameter.com@gmail.com',
    //     'Password' => '123456'
    // ];
    // $result = $userModel->create($user_data);
    // nice_dump($result);

    // $user = $userModel->find(2);
    // nice_dump($user);

    // $users = $userModel->findAll(['UserID[>]' => 0]);
    // nice_dump($users);

    // $users = $userModel->getAll();
    // nice_dump($users);

    // $users = $userModel->get(['UserID', 'FirstName']);
    // nice_dump($users);

    // $users = $userModel->get(['UserID', 'FirstName'], ['UserID[>]' => 1]);
    // nice_dump($users);

    // nice_dump($userModel->update(['LastName' => 'Mobasheri'], ['UserID[>]' => 1]));

    // nice_dump($userModel->delete(['LastName' => 'Azar']));

    // nice_dump($userModel->count(['LastName' => 'Azar']));

    // nice_dump($userModel->sum('UserID', ['LastName[=]' => 'Azar']));

    // $user = new App\Models\User(4);
    // nice_dump($user->FirstName);

    // $user = new App\Models\User(3);
    // nice_dump($user->remove());

    $user = new App\Models\User(4);
    $user->LastName = 'Mobasheri';
    $user->save();
    nice_dump($user->getAttrs());
}, [
    'Welcome'
]);

Route::get('/posts', 'Post@index');

Route::post('/posts/create', 'Post@create');

Route::get('/posts/{id}', ['Post', 'post']);
