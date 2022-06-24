<?php

class Controller {

    public static $model;

    public function index()
    {
        echo json_encode(static::$model::all());
    }

    public function get($parameters)
    {
        echo json_encode(static::$model::get($parameters));
    }

    public function create()
    {
        $arr = array ();
        $data = json_decode(file_get_contents('php://input'), true);
        foreach(static::$model::$fields as $key){
            $arr[$key] = (($key == 'password') ? password_hash($data["$key"], PASSWORD_DEFAULT) : $data["$key"]);
        }

        return static::$model::create($arr);
    }

    public function update($parameters)
    {
        $id = $parameters['id'];

        $arr = array(
            'id' => $parameters['id']
        );

        $data = json_decode(file_get_contents('php://input'), true);
        foreach (static::$model::$fields as $key) {
            $arr[$key] = isset($data["$key"]) ? $data["$key"] : "";
        }

        return static::$model::update($arr);
    }

    public function destroy($parameters)
    {
        $id = $parameters['id'];
        return static::$model::delete($id);
    }
}