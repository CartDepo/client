<?php


class CrashTypeModel implements Model {
   public function getAllCrashTypes() {

      $url = 'https://depo-api-beta.herokuapp.com/crash-type/all';

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