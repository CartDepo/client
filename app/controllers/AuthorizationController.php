<?php


class AuthorizationController extends Controller {
   public function __construct() {
      parent::__construct();
      $this->model = new AuthorizationModel();
   }

   public function index() {
      $this->pageTpl           = "v_authorization.php";
      $this->pageData['title'] = "Авторизация";
      $this->view->render($this->pageTpl, $this->pageData);
   }
}