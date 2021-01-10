<?php
use GuzzleHttp\Client as Client;


class AddClientModel implements Model{
   public function addNewClient() {
      $request = RequestData::getInstance();
      $post_data = $request->getPost();

      $httpClient = new Client(['base_uri' => 'https://depo-api-beta.herokuapp.com/client']);
      $response = $httpClient->request('POST', "/add", [
         'json' => $post_data
      ]);
      echo $response->getBody();
   }

   public function checkParams(array $params, string $methodName) {
      // TODO: Implement checkParams() method.
   }
}