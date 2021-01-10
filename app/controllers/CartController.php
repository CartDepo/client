<?php


class CartController extends Controller {
   public function __construct() {
      parent::__construct();
      $this->model = new CartModel();
   }

   /*
    * Pages
    */

//   All carts
   public function index() {
   }

   // form to add cart
   public function addCart() {
      $this->pageTpl                  = "v_addCart.php";
      $this->pageData['fields']       = [
         'number',
         'cartyear'
      ];
      $this->pageData['allClients']   = $this->model->getAllClientsForCart();
      $this->pageData['allContracts'] = $this->model->getAllContractsForCart();
      $this->pageData['allPlaces']    = $this->model->getAllPlacesForCart();
      $this->pageData['allTeams']     = $this->model->getAllTeamsForCart();
      $this->pageData['formUri']      = '/cart/addingCart';
      $this->pageData['title']        = "Добавить вагон";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingCart() {
      $this->model->addNewCart();
      header("Location: /cart/addCart");
   }
}