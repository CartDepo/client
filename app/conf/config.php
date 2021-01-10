<?php

// Path to app
define("PROJECT_FOLDER_PATH", "/app/");

// PATHS
define("CONTROLLER_PATH", ROOT . "/controllers/");
define("MODEL_PATH", ROOT . "/models/");
define("VIEW_PATH", ROOT . "/views/");

// core
require_once(ROOT . "core/Validate.php");
require_once(ROOT . "core/RequestMethods.php");
require_once(ROOT . "core/TableMethods.php");

// sys files
require_once("RequestData.php");
require_once("Routing.php");

// path to general files
require_once MODEL_PATH . 'Model.php';
require_once VIEW_PATH . 'View.php';
require_once CONTROLLER_PATH . 'Controller.php';

Routing::buildRoute();