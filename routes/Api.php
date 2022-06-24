<?php
    $router = new Router();
    $router->get('/users', 'UsersController@index');
    $router->post('/users/post', 'UsersController@create');
    $router->get('/users/%email%', 'UsersController@get');
    $router->post('/turbines/post', 'TurbinesController@create');