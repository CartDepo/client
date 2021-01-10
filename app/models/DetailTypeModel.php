<?php


class DetailTypeModel implements Model {

   public function addNewDetailType() {
      $request = RequestData::getInstance();
      $post_data = $request->getPost();

      $url = 'https://depo-api-beta.herokuapp.com/detail-type/add';

      $url = RequestMethods::makeGetRequest($url, $post_data);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      //Set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json'));
      curl_exec($ch);
      curl_close($ch);
   }

   public function getAllDetailTypes() {

      $url = 'https://depo-api-beta.herokuapp.com/detail-type/all';

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