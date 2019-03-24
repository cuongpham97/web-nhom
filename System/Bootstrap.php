<?php

class Bootstrap
{
    public function __construct()
    {   
        $controllersPath = PATH_ROOT . "/Controllers/" . PREFIX;

        $controller = CONTROLLER . 'Controller';
        $action     = ACTION;
        $params     = PARAMS;
        $path       = "{$controllersPath}/{$controller}.php";
        
		if (file_exists($path)) {
            require_once $path;
            
            if (class_exists($controller)) {
                $obj = new $controller;

                if (method_exists($obj, $action)) {
                    call_user_func_array([$obj, $action], $params);
                    return;
                }
            }
        }

        $this->loadError();
    } 

    private function loadError()
    {
        require PATH_ROOT . '/_404.php';
    }
}