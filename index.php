<?php

require_once 'vendor/autoload.php';


error_reporting(E_ALL);

ini_set('display_errors', 'On');

$app = new \App\Core\Bootstrap();
$app->run();