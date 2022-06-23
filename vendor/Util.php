<?php

class Util
{
    public static function formatByType($value)
    {
        switch (gettype($value)) {
            case 'string':
                return "'" . $value . "'";

            default:
                return $value;
        }
    }
}