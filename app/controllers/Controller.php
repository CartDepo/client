<?php


class Controller {

   public $model;
   public $view;
   protected $pageData = array();
   protected $pageTpl = "";

   public function __construct() {
      $this->view = new View();
   }

}