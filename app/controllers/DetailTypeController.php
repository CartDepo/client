<?php


class DetailTypeController extends Controller {
   public function __construct() {
      parent::__construct();
      $this->model = new DetailTypeModel();
   }

   /*
    * Pages
    */

   // all detail types
   public function index() {
   }

   // form to add detail type
   public function addDetailType() {
      $this->pageTpl             = "v_addDetailType.php";
      $this->pageData['fields']  = [
         'amount'
      ];

      $this->pageData['allDetailTypes'] = $this->model->getAllDetailTypes();

      $this->pageData['formUri'] = '/detailType/addingDetailType';
      $this->pageData['title']   = "Добавить тип детали";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingDetailType() {
      $this->model->addNewDetailType();
      header("Location: /detailType/addDetailType");
   }
}