<?php
    $router = new Router();
    $router->get('/users', 'UsersController@index');
    $router->get('/users/email/%email%', 'UsersController@get');
    $router->get('/users/%id%', 'UsersController@get');
    $router->get('/turbines/user/%user_id%', 'TurbinesController@get');
    $router->get('/turbines/%id%', 'TurbinesController@get');
    $router->get('/turbines', 'TurbinesController@index');

    $router->post('/turbines/post', 'TurbinesController@create');
    $router->post('/users/post', 'UsersController@create');
    $router->post('/turbines/update/%id%', 'TurbinesController@update');

    $router->delete('/turbines/delete/%id%', 'TurbinesController@destroy');
