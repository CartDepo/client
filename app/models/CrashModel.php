<?php

require_once MODEL_PATH . "CrashStatusModel.php";
require_once MODEL_PATH . "CrashTypeModel.php";
require_once MODEL_PATH . "CartModel.php";

class CrashModel implements Model{
   public function addNewCrash() {
      $request = RequestData::getInstance();
      $post_data = $request->getPost();

      $url = 'https://depo-api-beta.herokuapp.com/crash/add';

      $url = RequestMethods::makeGetRequest($url, $post_data);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      curl_exec($ch);
      curl_close($ch);
   }

   public function getAllCartsForCrash() {
      $cartModel = new CartModel();
      $result = $cartModel->getAllCarts();
      return json_decode($result, true);
   }

   public function getAllCrashStatusesForCrash() {
      $crashStatusModel = new CrashStatusModel();
      $result = $crashStatusModel->getAllCrashStatuses();
      return json_decode($result, true);
   }

   public function getAllCrashTypesForCrash() {
      $crashTypeModel = new CrashTypeModel();
      $result = $crashTypeModel->getAllCrashTypes();
      return json_decode($result, true);
   }

   public function getAllCrashes() {

      $url = 'https://depo-api-beta.herokuapp.com/crash/all';

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      $result = curl_exec($ch);
      curl_close($ch);

      return $result;
   }

   public function checkParams(array $params, string $methodName) {
      // TODO: Implement checkParams() method.
   }
}