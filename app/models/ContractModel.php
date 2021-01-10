<?php

require_once MODEL_PATH . "ClientModel.php";

class ContractModel implements Model {

   public function addNewContract() {

   }

   public function getAllClientsForContract() {
      $clientModel = new ClientModel();
      return $clientModel->getAllClients();
   }

   public function getAllManagersForContract() {
      $managerModel = new ManagerModel();
      return $managerModel->getAllManagers();
   }

   public function checkParams(array $params, string $methodName) {
      // TODO: Implement checkParams() method.
   }
}