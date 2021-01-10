<?php


class  RequestMethods {

   public static function makeGetRequest($url, $post_data){
      $new_url = $url;
      $firstKey = array_keys($post_data)[0];
      $value = $post_data[$firstKey];
      $new_url = $new_url . "?" . $firstKey;

      if (strlen($value) != 0) {
         $new_url = $new_url . "=" . $value;
      }

      // delete processed field
      unset($post_data[$firstKey]);

      // adding another get params
      foreach ($post_data as $key => $value) {
         $new_url = $new_url . "&" . $key;

         if (strlen($value) != 0) {
            $new_url = $new_url . "=" . $value;
         } else {
            $new_url = $new_url . "=";
         }
      }

      return $new_url;
   }

}