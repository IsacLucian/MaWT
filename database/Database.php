<?php

class Database
{
    private static $conn;

    public function createConnection($host, $username, $password, $db_name) {
        if(!self::$conn) {
            self::$conn = mysqli_connect($host, $username, $password, $db_name);
        }

        return static::$conn;
    }

    public function getConnection() {
        if(!self::$conn) {
            return false;
        }

        return static::$conn;
    }
}