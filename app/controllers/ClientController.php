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
      $this->pageData['fieldTitles'] = TableMethods::getFieldTitles($allClients[0]);

      // delete id from table
      unset($this->pageData['fieldTitles'][0]);

      // set russian titles to show table
      $this->pageData['tableTitlesName'] = ['ФИО', 'Серия', 'Номер', 'Телефон'];

      $this->pageData['title'] = "Список клиентов";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   // form to add client
   public function addClient() {
      $this->pageTpl             = "v_addClient.php";
      $this->pageData['fields']  = [
         ['fio', 'ФИО'],
         ['serial', 'Серия паспорта'],
         ['number', 'Номер паспорта'],
         ['phone', 'Телефон']
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