<?php


class ManagerController extends Controller {
   public function __construct() {
      parent::__construct();
      $this->model = new ManagerModel();
   }

   /*
    * Pages
    */

   // all Managers
   public function index() {

   }

   // form to add Manager
   public function addManager() {
      $this->pageTpl             = "v_addManager.php";
      $this->pageData['fields']  = [
         ['fio', 'ФИО'],
         ['phone', 'Телефон'],
      ];
      $this->pageData['formUri'] = '/manager/addingManager';
      $this->pageData['title']   = "Добавить менеджера";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingManager() {
      $this->model->addNewManager();
      header("Location: /manager/addManager");
   }
}