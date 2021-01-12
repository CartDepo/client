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

      $request    = RequestData::getInstance();
      $get_params = $request->getGetParams();

      // If we get only one note
      if ($get_params['id']) {
         $id                            = $get_params['id'];
         $this->pageTpl                 = "v_oneCrash.php";
         $oneCrash                      = $this->model->getOneCrash($id);
         $this->pageData['note']        = $oneCrash;
         $this->pageData['fieldTitles'] = TableMethods::getFieldTitles($oneCrash);
         $this->pageData['title']       = "Неисправность #" . $id;

         $this->pageData['formUri'] = '/crash/savingOneCrash';

         $this->pageData['fields']      = [
            ['description', 'Описание', true],
            ['cart', 'Номер вагона', true],
            ['crashType', 'Тип неисправности', true]
         ];
         $this->pageData['allStatuses'] = $this->model->getAllCrashStatusesForCrash();

         // if we get all notes
      } else {
         $this->pageTpl                 = "v_allCrashes.php";
         $allCrashes                    = $this->model->getAllCrashes();
         $this->pageData['notes']       = $allCrashes;
         $this->pageData['fieldTitles'] = TableMethods::getFieldTitles($allCrashes[0]);
         $this->pageData['title']       = "Список неисправностей";

         // delete id from table
         unset($this->pageData['fieldTitles'][0]);
      }

      // set russian titles to show table
      $this->pageData['tableTitlesName'] = ['Описание', 'Тип', 'Статус', 'Номер вагона'];
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
      $this->pageData['formUri']     = '/crash/addingCrash';
      $this->pageData['title']       = "Добавить неисправность";
      $this->view->render($this->pageTpl, $this->pageData);
   }

   /*
    * Actions
    */
   public function addingCrash() {
      $this->model->addNewCrash();
      header("Location: /crash/addCrash");
   }

   public function savingOneCrash() {
      $this->model->saveOneCrash();
      header("Location: /crash");
   }
}