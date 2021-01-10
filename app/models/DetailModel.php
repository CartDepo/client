<?php

require_once MODEL_PATH . "DetailTypeModel.php";
require_once MODEL_PATH . "CartModel.php";

class DetailModel implements Model {
   public function addNewDetail() {
      $request   = RequestData::getInstance();
      $post_data = $request->getPost();

      $url = 'https://depo-api-beta.herokuapp.com/detail/add-to-cart';

      $url = RequestMethods::makeGetRequest($url, $post_data);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      curl_exec($ch);
      curl_close($ch);
   }

   public function getAllDetailTypesForDetail() {
      $detailTypeModel = new DetailTypeModel();
      return $detailTypeModel->getAllDetailTypes();
   }

   public function getAllCartsForDetail() {
      $cartModel = new CartModel();
      return $cartModel->getAllCarts();
   }

   public function getAllDetails() {

      $url = 'https://depo-api-beta.herokuapp.com/detail/all';

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      $result = curl_exec($ch);
      curl_close($ch);

      return json_decode($result, true);
   }

   public function checkParams(array $params, string $methodName) {
      // TODO: Implement checkParams() method.
   }
}