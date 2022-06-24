<?php

include_once 'models/static/Model.php';

class Users extends Model {
    public static $table = 'users';
    public static $fields = [
        'email',
        'first_name',
        'last_name',
        'password'
    ];
}