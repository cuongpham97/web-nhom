<?php
require 'AdminController.php';

class DashboardController extends AdminController
{
    public function index()
    {
        $this->addViewData(array('title' => 'Dashboard'));
        $this->renderView();
    }
}