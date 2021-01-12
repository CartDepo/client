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

      $request    = RequestData::getInstance();
      $get_params = $request->getGetParams();

      var_dump($get_params);

      if ($get_params['id']) {
         $id                      = $get_params['id'];
         $this->pageTpl           = "v_oneContract.php";
         $oneContract             = $this->model->getOneContract($id);
         $this->pageData['note']  = $oneContract;
         $this->pageData['title'] = "Контракт #" . $id;

         $this->pageData['fields']      = [
            ['contractDate', 'Дата', true],
            ['cost', 'Стоимость', false],
            ['number', 'Номер', true],
         ];
         $this->pageData['allClients']  = $this->model->getAllClientsForContract();
         $this->pageData['allManagers'] = $this->model->getAllManagersForContract();
         $this->pageData['title']       = "Изменить договор";

         /************ DATA FOR ALL CARTS ***********/
         $allCarts                      = $oneContract['carts'];
         $this->pageData['notes']       = $allCarts;

         $this->pageData['fieldTitles'] = [
            'number',
            'year'
         ];
         // set russian titles to show table
         $this->pageData['tableTitlesName'] = ['Номер', 'Год'];

         // if we get all notes
      } else {
         $this->pageTpl = "v_allContracts.php";

         $allContracts                  = $this->model->getAllContracts();
         $this->pageData['notes']       = $allContracts;
         
         $this->pageData['fieldTitles'] = [
            'number',
            'contractDate',
            'cost',
            'status',
            'client'
         ];

         // set russian titles to show table
         $this->pageData['tableTitlesName'] = ['Номер', 'Дата', 'Стоимость', 'Статус', 'Клиент'];

         $this->pageData['title'] = "Список договоров";
      }

      $this->view->render($this->pageTpl, $this->pageData);
   }

   // form to add Contract
   public function addContract() {
      $this->pageTpl                 = "v_addContract.php";
      $this->pageData['fields']      = [
         ['contractdate', 'Дата'],
         ['cost', 'Стоимость'],
         ['number', 'Номер'],
      ];
      $this->pageData['allClients']  = $this->model->getAllClientsForContract();
      $this->pageData['allManagers'] = $this->model->getAllManagersForContract();
      $this->pageData['formUri']     = '/Contract/addingContract';
      $this->pageData['title']       = "Добавить контракт";
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