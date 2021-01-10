<?php


class TeamController extends Controller {
   public function __construct() {
      parent::__construct();
      $this->model = new PlaceModel();
   }

   /*
    * Pages
    */

   // all Places
   public function index() {

   }

   // form to add Place
   public function addManager() {
//      $this->pageTpl = "v_addManager.php";
//      $this->pageData['fields'] = [
//         'fio',
//         'phone'
//      ];
//      $this->pageData['formUri'] = '/manager/addingManager';
//      $this->pageData['title'] = "Добавление контракта";
//      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingManager() {
//      $this->model->addNewManager();
//      header("Location: /manager/addManager");
   }
}