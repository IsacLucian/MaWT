<?php

include_once 'models/static/Model.php';

class Turbines extends Model {
    public static $table = 'turbines';
    public static $fields = [
        'user_id',
        'name',
        'status',
        'lat',
        'lon'
    ];
}