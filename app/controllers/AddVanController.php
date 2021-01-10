<?php


class AddVanController extends Controller {

   public function __construct() {
      parent::__construct();
      $this->model = new AddVanController();
   }

   public function index() {
      $this->pageTpl = "v_addVan.php";
      $this->pageData['title'] = "Добавление записи";
      $this->view->render($this->pageTpl, $this->pageData);
   }

}