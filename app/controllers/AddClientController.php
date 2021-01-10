<?php

class AddClientController extends Controller {

   public function __construct() {
      parent::__construct();
      $this->model = new addClientModel();
   }

   public function index() {
      $this->pageTpl = "v_addClient.php";
      $this->pageData['fields'] = [
         'fio',
         'serial',
         'number',
         'phone'
      ];
      $this->pageData['formUri'] = '/addClient/addingClient';
      $this->pageData['title'] = "Добавление клиента";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   public function addingClient() {
      $this->model->addNewClient();
      header("Location: /addClient");
   }
}