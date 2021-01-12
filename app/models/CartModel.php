<?php

require_once MODEL_PATH . "ClientModel.php";
require_once MODEL_PATH . "ContractModel.php";
require_once MODEL_PATH . "TeamModel.php";
require_once MODEL_PATH . "PlaceModel.php";

class CartModel implements Model {
   public function addNewCart() {
      $request   = RequestData::getInstance();
      $post_data = $request->getPost();

      $url = 'https://depo-api-beta.herokuapp.com/cart/add';

      $url = RequestMethods::makeGetRequest($url, $post_data);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      curl_exec($ch);
      curl_close($ch);
   }

   public function getAllClientsForCart() {
      $clientModel = new ClientModel();
      return $clientModel->getAllClients();
   }

   public function getAllContractsForCart() {
      $contractModel = new ContractModel();
      return $contractModel->getAllContracts();
   }

   public function getAllPlacesForCart() {
      $placeModel = new PlaceModel();
      return $placeModel->getAllPlaces();
   }

   public function getAllTeamsForCart() {
      $teamsModel = new TeamModel();
      return $teamsModel->getAllFreeTeams();
   }

   public function getAllCarts() {

      $url = 'https://depo-api-beta.herokuapp.com/cart/all';

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      $result = curl_exec($ch);
      curl_close($ch);

      return json_decode($result, true);
   }

   public function getOneCart($cartId) {
      $url = 'https://depo-api-beta.herokuapp.com/cart?cartId=' . $cartId;

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      $result = curl_exec($ch);
      curl_close($ch);

      return json_decode($result, true);
   }

   public function saveOneCart() {
      $request   = RequestData::getInstance();
      $post_data = $request->getPost();

      $url = 'https://depo-api-beta.herokuapp.com/cart/change';

      // select post fields
      $new_post_data = [
         'cartId' => $post_data['id'],
         'placeId' => $post_data['placeId'],
         'teamId' => $post_data['teamId']
      ];

      $url = RequestMethods::makeGetRequest($url, $new_post_data);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      curl_exec($ch);
      curl_close($ch);
   }

   public function checkParams(array $params, string $methodName) {
      // TODO: Implement checkParams() method.
   }
}