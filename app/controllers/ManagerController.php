<?php


class ManagerController extends Controller {
   public function __construct() {
      parent::__construct();
      $this->model = new ManagerModel();
   }


   /*
    * Pages
    */

   // all Contracts
   public function index() {
//      $this->pageTpl = "v_addContract.php";
//      $this->pageData['title'] = "Добавление контракта";
//      $this->view->render($this->pageTpl, $this->pageData);
   }

   // form to add Contract
   public function addContract() {
//      $this->pageTpl = "v_addClient.php";
//      $this->pageData['fields'] = [
//         'contractDate',
//         'number',
//         'clientId',
//         'managerId',
//         'statusId'
//      ];
//      $this->pageData['formUri'] = '/Сontract/addingContract';
//      $this->pageData['title'] = "Добавление контракта";
//      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingContract() {

   }
}