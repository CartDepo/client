<?php


class ContractController extends Controller {
   public function __construct() {
      parent::__construct();
      $this->model = new ContractModel();
   }


   /*
    * Pages
    */

   // all Contracts
   public function index() {
      $this->pageTpl = "v_addContract.php";
      $this->pageData['title'] = "Добавление контракта";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   // form to add Contract
   public function addContract() {
      $this->pageTpl = "v_addContract.php";
      $this->pageData['fields'] = [
         'contractDate',
         'number',
         'clientId',
         'managerId'
      ];
      $this->pageData['formUri'] = '/Contract/addingContract';
      $this->pageData['title'] = "Добавление контракта";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingContract() {

   }
}