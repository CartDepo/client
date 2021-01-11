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
      $this->pageTpl = "v_allPlaces.php";

      $allPlaces                     = $this->model->getAllPlaces();
      $this->pageData['notes']       = $allPlaces;
      $this->pageData['fieldTitles'] = TableMethods::getFieldTitles($allPlaces[0]);

      // delete id from table
      unset($this->pageData['fieldTitles'][0]);

      // set russian titles to show table
      $this->pageData['tableTitlesName'] = ['Номер', 'Тип', 'Статус'];

      $this->pageData['title'] = "Список расположений";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   public function AllFree() {
      $this->pageTpl = "v_allPlaces.php";

      $request = RequestData::getInstance();

      $get_params = $request->getGetParams();

      $allPlaces                     = $this->model->getAllFreeObjects($get_params['placeType']);
      $this->pageData['notes']       = $allPlaces;
      $this->pageData['fieldTitles'] = TableMethods::getFieldTitles($allPlaces[0]);

      // delete id from table
      unset($this->pageData['fieldTitles'][0]);

      // set russian titles to show table
      $this->pageData['tableTitlesName'] = ['Номер', 'Тип', 'Статус'];

      $this->pageData['title'] = "Список свободных ангаров";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   // form to add Place
   public function addPlace() {
      $this->pageTpl             = "v_addPlace.php";
      $this->pageData['fields']  = [
         'fio',
         'phone'
      ];
      $this->pageData['formUri'] = '/place/addingPlace';
      $this->pageData['title']   = "Добавить расположение";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingPlace() {
      $this->model->addNewPlace();
      header("Location: /place/addPlace");
   }
}