<?php


class CrashController extends Controller {
   public function __construct() {
      parent::__construct();
      $this->model = new CrashModel();
   }

   /*
    * Pages
    */

//   All crashes
   public function index() {
      $this->pageTpl = "v_allCrashes.php";

      $allCrashes                    = $this->model->getAllCrashes();
      $this->pageData['notes']       = $allCrashes;
      $this->pageData['fieldTitles'] = TableMethods::getFieldTitles($allCrashes[0]);

      // delete id from table
      unset($this->pageData['fieldTitles'][0]);

      // set russian titles to show table
      $this->pageData['tableTitlesName'] = ['Описание', 'Тип', 'Статус', 'Номер вагона'];

      $this->pageData['title']   = "Список неисправностей";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   // form to add crash
   public function addCrash() {
      $this->pageTpl                 = "v_addCrash.php";
      $this->pageData['fields']      = [
         ['description', 'Описание']
      ];
      $this->pageData['allCarts']    = $this->model->getAllCartsForCrash();
      $this->pageData['allTypes']    = $this->model->getAllCrashTypesForCrash();
      $this->pageData['allStatuses'] = $this->model->getAllCrashStatusesForCrash();

      $this->pageData['formUri'] = '/crash/addingCrash';
      $this->pageData['title']   = "Добавить неисправность";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingCrash() {
      $this->model->addNewCrash();
      header("Location: /crash/addCrash");
   }
}