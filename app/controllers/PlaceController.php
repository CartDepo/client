<?php


class PlaceController extends Controller {
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
   public function addPlace() {
      $this->pageTpl = "v_addManager.php";
      $this->pageData['fields'] = [
         'fio',
         'phone'
      ];
      $this->pageData['formUri'] = '/place/addingPlaces';
      $this->pageData['title'] = "Добавление расположения";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingPlaces() {
      $this->model->addNewplaces();
      header("Location: /place/addPlace");
   }
}