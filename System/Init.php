<?php

class Init 
{
    public function __construct()
    {
        $urlParams = $this->getUrlParams();

        //Web folder
        define('WEB_FOLDER', '/Webblog');

        //Database
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'webblog');

        //Url params
        define('PREFIX', $urlParams['prefix']);
        define('CONTROLLER', $urlParams['controller']);
        define('ACTION', $urlParams['action']);
        define('PARAMS', $urlParams['params']);

        //Path
        define('PATH_VIEW', PATH_ROOT . '/Views');
    }

    private function getUrlParams()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $prefix     = isset($_GET['prefix']) ? ucfirst($_GET['prefix']) : 'Website';
        $controller = isset($url[0]) ? ucfirst($this->dashesToCamelCase(array_shift($url))) : 'Home';
        $action 	= isset($url[0]) ? $this->dashesToCamelCase(array_shift($url)) : 'index';
        $params     = $url;

        return array(
            'prefix'     => $prefix,
            'controller' => $controller,
            'action'     => $action,
            'params'     => $params
        );
    }

    private function dashesToCamelCase($str)
    {
        $str = str_replace('-', ' ', strtolower($str));
        $str = str_replace(' ',  '', ucwords($str));

        return lcfirst($str);;
    }
}