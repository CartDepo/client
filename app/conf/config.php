<?php


// PATHS
define("CONTROLLER_PATH", ROOT . "/controllers/");
define("MODEL_PATH", ROOT . "/models/");
define("VIEW_PATH", ROOT . "/views/");

// sys files
require_once("RequestData.php");
require_once("Routing.php");

// SETTINGS

// Objects

// core files

// path to general files
require_once MODEL_PATH . 'Model.php';
require_once VIEW_PATH . 'View.php';
require_once CONTROLLER_PATH . 'Controller.php';

Routing::buildRoute();