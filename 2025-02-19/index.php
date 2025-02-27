<?php

class Session
{
    private static $data = [];

    public static function get($key)
    {
        return self::$data[$key] ?? null;
    }
    public static function set($key, $value)
    {
        self::$data[$key] = $value;
    }
    public static function flash($key)
    {
        echo self::$data[$key] ?? null;
        unset(self::$data[$key]);
    }
    public static function remove($key)
    {
        unset(self::$data[$key]);
    }
    public static function removeAll()
    {
        self::$data = [];
    }
    public static function getAll()
    {
        return self::$data;
    }
    public static function has($key)
    {
        return isset(self::$data[$key]);
    }
}

Session::set('name', 'Mahmoud');
Session::set('age', 55);
Session::set('city', 'Cairo');
echo Session::get('name');
echo '<br>';
echo Session::get('age');
echo '<br>';
echo Session::get('city');
echo '<br>';
Session::flash('name');
echo '<br>';
var_dump(Session::has('name'));
echo '<br>';
Session::remove('age');
var_dump(Session::getAll());
