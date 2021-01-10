<?php

// Singleton class

class Routing {
   protected static $_instance;

   private function __construct() {
   }

   private function __clone() {
   }

   public static function getInstance() {
      if (self::$_instance === null) {
         self::$_instance = new self();
      }

      return self::$_instance;
   }

   public static function buildRoute() {
      $controllerName = 'AuthorizationController';
      $modelName = "AuthorizationModel";
      $actionName = "index";

      $request = RequestData::getInstance();

      // Preparing information for searching controller and action
      $route = explode("/", parse_url($request->getUri(), PHP_URL_PATH));
      $route = self::deleteAllSpacesFromArray($route);

      $pathToAppParts = explode("/", ROOT);
      $pathToAppParts = self::deleteAllSpacesFromArray($pathToAppParts);

      // Delete redundant information from path
      foreach ($pathToAppParts as $value) {
         $key = array_search($value, $route);
         if ($key) {
            unset($route[$key]);
         }
      }

      foreach (array_reverse($route) as $value) {
         if ($value != '') {
            if (file_exists(CONTROLLER_PATH . ucfirst($value) . "Controller" . ".php")) {
               $controllerName = ucfirst($value) . "Controller";
               $modelName = ucfirst($value) . "Model";
               break;
            } else {
               $actionName = $value;
            }
         }
      }

      /*
       * Require controller and model
      */
      require_once CONTROLLER_PATH . $controllerName . ".php";
      require_once MODEL_PATH . $modelName . ".php";

      $controller = new $controllerName();
      if (method_exists($controller, $actionName)) {
         $controller->$actionName();
      } else {
         header("Location: /error404");
      }
   }

   protected static function deleteAllSpacesFromArray(array $arr) {
      foreach ($arr as $key => $value) {
         if ($value == '') {
            unset($arr[$key]);
         }
      }
      return $arr;
   }
}