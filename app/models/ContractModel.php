<?php

require_once MODEL_PATH . "ClientModel.php";
require_once MODEL_PATH . "ManagerModel.php";

class ContractModel implements Model {

   public function addNewContract() {
      $request = RequestData::getInstance();
      $post_data = $request->getPost();

      $url = 'https://depo-api-beta.herokuapp.com/contract/add';

      $url = RequestMethods::makeGetRequest($url, $post_data);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      curl_exec($ch);
      curl_close($ch);
   }

   public function getAllContracts() {
      $url = 'https://depo-api-beta.herokuapp.com/contract/all';

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      $result = curl_exec($ch);
      curl_close($ch);

      return $result;
   }

   public function getAllClientsForContract() {
      $clientModel = new ClientModel();
      $result = $clientModel->getAllClients();
      return json_decode($result, true);
   }

   public function getAllManagersForContract() {
      $managerModel = new ManagerModel();
      $result = $managerModel->getAllManagers();
      return json_decode($result, true);
   }

   public function checkParams(array $params, string $methodName) {
      // TODO: Implement checkParams() method.
   }
}