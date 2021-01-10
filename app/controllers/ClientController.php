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
      $this->pageTpl = "v_allClients.php";

      $allClients                    = $this->model->getAllClients();
      $this->pageData['notes']       = $allClients;
      $this->pageData['tableTitles'] = TableMethods::getTableTitles($allClients[0]);

      $this->pageData['formUri'] = '/crash/addingCrash';
      $this->pageData['title']   = "Список клиентов";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   // form to add client
   public function addClient() {
      $this->pageTpl             = "v_addClient.php";
      $this->pageData['fields']  = [
         'fio',
         'serial',
         'number',
         'phone'
      ];
      $this->pageData['formUri'] = '/Client/addingClient';
      $this->pageData['title']   = "Добавить клиента";
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