<?php
    $router = new Router();
    $router->get('/users', 'UsersController@index');
    $router->post('/users/post', 'UsersController@create');