<?php
namespace app\lib;
class Session 
{
    public static function init():void
    {
        session_start();
    }

    public static function set($key, $val):void
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public static function destroy()
    {
        session_destroy();
        session_unset();
    }
}