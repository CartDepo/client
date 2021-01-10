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

   }

   // form to add Contract
   public function addContract() {
      $this->pageTpl = "v_addContract.php";
      $this->pageData['fields'] = [
         'contractdate',
         'cost',
         'number'
      ];
      $this->pageData['allClients'] = $this->model->getAllClientsForContract();
      $this->pageData['allManagers'] = $this->model->getAllManagersForContract();
      $this->pageData['formUri'] = '/Contract/addingContract';
      $this->pageData['title'] = "Добавить контракт";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingContract() {
      $this->model->addNewContract();
      header("Location: /contract/addContract");
   }
}