<?php


class View {
   public function render($tpl, $pageData) {
      if (file_exists(VIEW_PATH . $tpl)) {
         include VIEW_PATH . $tpl;
      } else
         header("Location: 404");
   }
}