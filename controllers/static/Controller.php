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

        foreach(static::$model::$fields as $key){
            $arr[$key] = (($key == 'password') ? password_hash($_POST["$key"], PASSWORD_DEFAULT) : $_POST["$key"]);
        }

        return static::$model::create($arr);
    }

    public function update($parameters)
    {
        $id = $parameters['id'];

        $arr = array(
            'id' => $parameters['id']
        );

        foreach (static::$model::$fields as $key) {
            $arr[$key] = isset($_POST["$key"]) ? $_POST["$key"] : "";
        }

        return static::$model::update($arr);
    }

    public function destroy($parameters)
    {
        $id = $parameters['id'];
        return static::$model::delete($id);
    }
}