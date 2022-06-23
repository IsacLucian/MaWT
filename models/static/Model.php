<?php

require_once 'config/Config.php';
require_once 'vendor/Util.php';

class Model
{
    private static $table;
    private static $fields = [];

    public static function all() {

        $conn = (new Database)->getConnection();

        if (! $conn) {
            return 'Database connection error.';
        }

        $query = 'SELECT * FROM ' . static::$table;

        $execStmt = mysqli_query($conn, $query);

        $result = [];

        while($row = mysqli_fetch_assoc($execStmt)){
            $result[] = $row;
        }

        return $result;
    }

    public static function get($parameters)
    {
        foreach ($parameters as $key1 => $value1) {
            $key = $key1;
            $value = $value1;
        }

        $conn = (new Database)->getConnection();
        if (! $conn) {
            return 'Database connection error.';
        }

        $query = 'SELECT * FROM ' . static::$table . ' WHERE '. $key . '=' . Util::formatByType($value);

        $result = mysqli_query($conn, $query);
        $object = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $object[] = $row;
        }

        return $object;
    }

    public static function create($args)
    {
        if (count(static::$fields) !== count($args)) {
            return false;
        }

        $conn = (new Database)->getConnection();

        if (! $conn) {
            return 'Database connection error.';
        }

        $columns = implode(',', static::$fields);
        $values = [];
        foreach ($args as $key => $arg) {
            $values[] = Util::formatByType($arg);
        }

        $query = 'INSERT INTO ' . static::$table .'(' . $columns . ')' . ' VALUES (' . implode(',', $values) . ')';

        $stmt = $conn->query($query);

        return $stmt;
    }

    public static function update($args)
    {
        if (count(static::$fields) !== (count($args) - 1)) {
            return false;
        }

        $id = isset($args['id']) ? $args['id'] : $args[0];

        $conn = (new Database)->getConnection();
        if (! $conn) {
            return 'Database connection error.';
        }

        $s = '';
        foreach ($args as $key => $value) {
            if($value !== "" && $key !== 'id'){
                $s = $key . '=' . Util::formatByType($value) .', ' . $s;
            }
        }

        $s = substr($s, 0,-2);

        $query = 'UPDATE ' . static::$table . ' SET ' . $s . 'WHERE id = ' . $id;

        $stmt = $conn->query($query);

        return $stmt;
    }

    public static function delete($id)
    {
        $conn = (new Database)->getConnection();
        if (! $conn) {
            return 'Database connection error.';
        }


        $stmt = $conn->prepare('DELETE FROM ' . static::$table . ' WHERE id = ?');
        $stmt->bind_param('i', $id);

        $stmt->execute();
        $result = $stmt->affected_rows !== 0;

        $stmt->close();

        return $result;
    }
}