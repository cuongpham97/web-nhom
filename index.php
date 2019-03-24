<?php
session_start();
define('PATH_ROOT', __DIR__);

require PATH_ROOT . '/System/Init.php';
require PATH_ROOT . '/System/Bootstrap.php';
require PATH_ROOT . '/System/DB.php';
require PATH_ROOT . '/System/helper.php';

$init = new Init;
$app = new Bootstrap;