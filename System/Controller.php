<?php

abstract class Controller
{
    protected $viewData = [];

    protected function loadModel($model)
    {
        $modelPath = PATH_ROOT . "/Models/{$model}.php";
        require_once $modelPath;
        return new $model;
    }

    protected function json($data)
    {
        header('Content-type: application/json');
        echo json_encode($data);
    }

    protected function addViewData($data)
    {
        $this->viewData = array_merge($this->viewData, $data);
    }

    protected function renderView()
    {
        extract($this->viewData);
        $viewPath = PATH_ROOT . '/Views/' . PREFIX . '/' . CONTROLLER . '/' . ACTION . '.php';
        require_once $viewPath;
    }
}