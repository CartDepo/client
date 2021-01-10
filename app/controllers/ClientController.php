<?php

class ClientController extends Controller {

   public function __construct() {
      parent::__construct();
      $this->model = new ClientModel();
   }

   /*
    * Pages
    */

//   All clients
   public function index() {
   }

   // form to add client
   public function addClient() {
      $this->pageTpl = "v_addClient.php";
      $this->pageData['fields'] = [
         'fio',
         'serial',
         'number',
         'phone'
      ];
      $this->pageData['formUri'] = '/Client/addingClient';
      $this->pageData['title'] = "Добавление клиента";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingClient() {
      $this->model->addNewClient();
      header("Location: /client/addClient");
   }
}