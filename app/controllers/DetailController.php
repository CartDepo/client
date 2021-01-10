<?php


class DetailController extends Controller {
   public function __construct() {
      parent::__construct();
      $this->model = new DetailModel();
   }

   /*
    * Pages
    */

   // all details
   public function index() {
   }

   // form to add detail
   public function addDetail() {
      $this->pageTpl            = "v_addDetail.php";
      $this->pageData['fields'] = [
         'serialNumber'
      ];

      $this->pageData['allDetailTypes'] = $this->model->getAllDetailTypesForDetail();
      $this->pageData['allCarts']        = $this->model->getAllCartsForDetail();

      $this->pageData['formUri'] = '/detail/addingDetail';
      $this->pageData['title']   = "Добавить деталь для вагона";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingDetail() {
      $this->model->addNewDetail();
      header("Location: /detail/addDetail");
   }
}