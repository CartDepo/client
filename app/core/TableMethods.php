<?php


class TableMethods {
   public static function getFieldTitles($note) {
      $titles = [];
      foreach ($note as $key => $value) {
         $titles[] = $key;
      }
      return $titles;
   }

   public static function deleteIdFromData($notes) {
      $new_notes = [];
      foreach ($notes as $value) {
         $new_value = $value;
         unset($new_value['id']);
         $new_notes[] = $new_value;
      }
      var_dump($new_notes);
      return $new_notes;
   }
}