<?php


class TableMethods {
   public static function getTableTitles($note) {
      $titles = [];
      foreach ($note as $key => $value) {
         $titles[] = $key;
      }

      return $titles;
   }
}