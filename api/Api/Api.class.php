<?php

abstract class Api
{

    static abstract function get(Request $request);

    static abstract function post(Request $request);

    static abstract function put(Request $request);

    static abstract function delete(Request $request);

    static function execute(Request $request)
    {
        if (empty($request->data['url'][0])) {
            return FALSE;
        }
        $classname = 'Api' . ucfirst($request->data['url'][0]);
        $filename = 'api/Api/' . $classname . '.class.php';
        if (! is_file($filename)) {
            return FALSE;
        }
        include $filename;
        if (! is_subclass_of(new $classname(), self::class)) {
            return FALSE;
        }
        $func = strtolower($request->method);
        if (! is_callable([
            $classname,
            $func
        ])) {
            return FALSE;
        }
        $callback = [
            $classname,
            $func
        ];
        call_user_func($callback, $request);
        return TRUE;
    }
}
