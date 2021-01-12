<?php


class  RequestMethods {

   public static function makeGetRequest($url, $post_data) {
      $newUrl   = $url;
      $firstKey = array_keys($post_data)[0];
      $value    = $post_data[$firstKey];
      $newUrl   = $newUrl . "?" . $firstKey;

      if (strlen($value) != 0) {
         $newUrl = $newUrl . "=" . $value;
      }

      // delete processed field
      unset($post_data[$firstKey]);

      foreach ($post_data as $key => $value) {
         $newUrl = $newUrl . "&" . $key;

         if (strlen($value) != 0) {
            $newUrl = $newUrl . "=" . $value;
         } else {
            $newUrl = $newUrl . "=";
         }
      }
      return $newUrl;
   }
}