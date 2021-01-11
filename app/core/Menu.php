<?php

require_once MODEL_PATH . "PlaceTypeModel.php";

class Menu {
   public static function getPlaceTypes() {
      $placeTypeModel = new PlaceTypeModel();
      return $placeTypeModel->getAllPlaceTypes();
   }
}