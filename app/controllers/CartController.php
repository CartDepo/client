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

      $request    = RequestData::getInstance();
      $get_params = $request->getGetParams();

      // If we get only one note
      if ($get_params['id']) {
         $id                      = $get_params['id'];
         $this->pageTpl           = "v_oneCart.php";
         $oneCart                 = $this->model->getOneCart($id);
         $this->pageData['note']  = $oneCart;
         $this->pageData['title'] = "Вагон #" . $id;

         $this->pageData['formUri'] = '/cart/savingOneCrash';

         $this->pageData['fields'] = [
            ['number', 'Номер', true],
            ['year', 'Год', true],
            ['contract', 'Контракт', true],
         ];

         $this->pageData['allPlaces']  = $this->model->getAllPlacesForCart();
         $this->pageData['allTeams']   = $this->model->getAllTeamsForCart();
         $this->pageData['allTeams'][] = $oneCart['team'];

         /************ DATA FOR ALL CART'S CRASHES ***********/
         $allCrashes                    = $oneCart['crashes'];
         $this->pageData['notes']       = $allCrashes;
         $this->pageData['fieldTitles'] = TableMethods::getFieldTitles($allCrashes[0]);

         // delete id from table
         unset($this->pageData['fieldTitles'][0]);

         // set russian titles to show table
         $this->pageData['tableTitlesName'] = ['Описание', 'Тип', 'Статус'];

         // if we get all notes
      } else {
         $this->pageTpl = "v_allCarts.php";

         $allCarts                = $this->model->getAllCarts();
         $this->pageData['notes'] = $allCarts;
//         $this->pageData['fieldTitles'] = TableMethods::getFieldTitles($allCarts[0]);
         $this->pageData['fieldTitles'] = [
            'number',
            'year',
            'contract',
            'team',
            'place'
         ];
         // delete id from table
//         unset($this->pageData['fieldTitles'][0]);

         // set russian titles to show table
         $this->pageData['tableTitlesName'] = [
            'Номер',
            'Год',
            'Договор',
            'Бригада',
            'Расположение'];

         $this->pageData['title'] = "Список вагонов";
      }
      $this->view->render($this->pageTpl, $this->pageData);
   }

   // form to add cart
   public function addCart() {
      $this->pageTpl                  = "v_addCart.php";
      $this->pageData['fields']       = [
         ['number', 'Номер'],
         ['cartyear', 'Год']
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

   public function savingOneCrash() {
      $this->model->saveOneCart();
      header("Location: /cart");
   }
}