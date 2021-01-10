<?php

class ClientModel implements Model {
   public function addNewClient() {
      $request = RequestData::getInstance();
      $post_data = $request->getPost();

      $url = 'https://depo-api-beta.herokuapp.com/client/add';

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST, 1);
      $data = $post_data;
      $jsonDataEncoded = json_encode($data);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      curl_exec($ch);
      curl_close($ch);
   }

   public function getAllClients() {

      $url = 'https://depo-api-beta.herokuapp.com/client/all';

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